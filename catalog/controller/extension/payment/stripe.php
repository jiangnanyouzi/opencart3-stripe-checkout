<?php

class ControllerExtensionPaymentStripe extends Controller {

    public function index() {

        // handles the XHR request for client side
        $data['action'] = $this->url->link('extension/payment/stripe/confirm', '', true);

        return $this->load->view('extension/payment/stripe', $data);
    }

    public function confirm() {

        try {

            $this->load->model('extension/payment/stripe');
            $this->initStripe();

            $data = array();
            if ($this->config->get('payment_stripe_environment') == 'live') {
                $data['publicKey'] = $this->config->get('payment_stripe_live_public_key');
            } else {
                $data['publicKey'] = $this->config->get('payment_stripe_test_public_key');
            }

            // get order info
            $this->load->model('checkout/order');
            $order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

            $line_items = [
                'name' => 'Order No: ' . $order_info['order_id'],
                'description' => 'online payment',
                'amount' => $order_info['total'] * 100,
                'currency' => $order_info['currency_code'],
                'quantity' => 1,
                // 'images' => ['http://aaa.com/1.jpg', 'http://aaa.com/2.jpg'],
            ];


            $createParam = [
                'client_reference_id' => $order_info['order_id'],
                'payment_method_types' => ['card'],
                'line_items' => [$line_items],
                'payment_intent_data' => [
                    'metadata' => [
                        'order_no' => $order_info['order_id'],
                    ],
                ],
                'success_url' => $this->url->link('checkout/success', '', true),
                'cancel_url' => $this->url->link('checkout/failure', '', true),
            ];
            $session = \Stripe\Checkout\Session::create($createParam);

            // var_dump($session['id']);

            $this->model_extension_payment_stripe->log(__FILE__, __LINE__, "Session Id ", json_encode(['sesson_id' => $session['id'], 'order_id' => $order_info['order_id']]));

            if (!isset($session['id']) || !$session['id']) {

                return null;
            }

            $data['sessionId'] = $session['id'];

            $this->response->setOutput($this->load->view('extension/payment/stripe_confirm', $data));
        } catch (\Exception $e) {
            $json = array('error' => $e->getMessage());

            $this->model_extension_payment_stripe->log($e->getFile(), $e->getLine(), "Exception caught in confirm() method", $e->getMessage());

        }
    }

    public function initStripe() {
        // load stripe libraries
        $this->load->library('stripe');

        if ($this->config->get('payment_stripe_environment') == 'live' || (isset($this->request->request['livemode']) && $this->request->request['livemode'] == "true")) {
            $stripe_secret_key = $this->config->get('payment_stripe_live_secret_key');
        } else {
            $stripe_secret_key = $this->config->get('payment_stripe_test_secret_key');
        }

        if ($stripe_secret_key != '' && $stripe_secret_key != null) {
            \Stripe\Stripe::setApiKey($stripe_secret_key);
            return true;
        }

        $this->load->model('extension/payment/stripe');
        $this->model_extension_payment_stripe->log(__FILE__, __LINE__, "Unable to load stripe libraries");
        throw new Exception("Unable to load stripe libraries.");
        // return false;
    }

    public function notify() {

        try {

            $payload = @file_get_contents('php://input');

            /*
                $json = json_decode($payload, true);
                if (isset($json['stripe_session']) && is_array($session = $json['stripe_session'])) {
                    $this->chargeAndUpdateOrder($session);
                    echo json_encode(array('status' => 1, 'message' => 'success'));
                    exit();
                }
            */

            $this->initStripe();

            if ($this->config->get('payment_stripe_live_endpoint_key') == 'live' || (isset($this->request->request['livemode']) && $this->request->request['livemode'] == "true")) {
                $stripe_endpoint_key = $this->config->get('payment_stripe_live_endpoint_key');
            } else {
                $stripe_endpoint_key = $this->config->get('payment_stripe_test_endpoint_key');
            }

            $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
            $event = null;
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $stripe_endpoint_key
            );
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }catch(\Exception $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }

        // Handle the checkout.session.completed event
        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;

            $this->load->model('extension/payment/stripe');
            $this->model_extension_payment_stripe->log(__FILE__, __LINE__, "Checkout Session ", json_encode($session));
            $this->chargeAndUpdateOrder($session);
        }

        http_response_code(200);
    }

    public function chargeAndUpdateOrder($session){

        if(isset($session['client_reference_id']) && !empty($clientReferenceId = $session['client_reference_id'])) {

            // insert stripe order
            $message = 'Payment Intent ID: ' . $session['payment_intent'] . PHP_EOL . 'Status: ' . $session['payment_status'];

            $this->load->model('checkout/order');

            $order_info = $this->model_checkout_order->getOrder($clientReferenceId);

            // update order statatus & addOrderHistory
            // paid will be true if the charge succeeded, or was successfully authorized for later capture.
            if ($session['payment_status'] == "paid") {
                $this->model_checkout_order->addOrderHistory($order_info['order_id'], $this->config->get('payment_stripe_order_success_status_id'), $message, false);
            } else {
                $this->model_checkout_order->addOrderHistory($order_info['order_id'], $this->config->get('payment_stripe_order_failed_status_id'), $message, false);
            }

            // charge completed successfully
            return true;

        } else {
            // charge could not be completed
            return false;
        }
    }
}
