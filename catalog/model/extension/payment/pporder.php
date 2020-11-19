<?php

class ModelExtensionPaymentPPOrder extends Model {


    public function checkOrder($ordersn, $ip) {
        $sql = " select *  from " . DB_PREFIX . "pporder where status=0 and ordersn='" . $ordersn . "' and ip='" . $ip . "' limit 1";
        $data = $this->db->query($sql);
        if ($data->row) {
            return $data->row;
        }
        return false;
    }

    public function getOrder($orderid) {

        $order = $this->db->query("select * from  " . DB_PREFIX . "pporder  where id=" . $orderid . " limit 1 ");
        #print_r(		$orderid     );
        if ($order->num_rows) {
            return $order->row;
        }
        return false;
    }

    public function updateOrder($id, $data) {

        $sql = "
                UPDATE " . DB_PREFIX . "pporder SET  orderid = '" . $this->db->escape($data["orderid"]) . "',
                merchantid = '" . $this->db->escape($data['merchantid']) . "',
                siteid = '" . $this->db->escape($data['siteid']) . "',
                totalamount = '" . $this->db->escape($data['totalamount']) . "',
                currency = '" . $this->db->escape($data['currency']) . "',
                payment_type = '" . $this->db->escape(intval($data['payment_type'])) . "', 
                ordersn = '" . $this->db->escape($data['ordersn']) . "', 
                result = '" . $this->db->escape(json_encode($data['result'])) . "',
                
                domain = '" . (string)$data['domain'] . "',
                cancelurl = '" . (string)$data['cancel_url'] . "',
                callbackurl = '" . (string)$data['callback_url'] . "',
                notifyurl = '" . (string)$data['notify_url'] . "',
                ua = '" . (string)$data['user_agent'] . "' 
                where id=" . $id . "
                ";
        $this->db->query($sql);
        #  echo $sql;


        return $id;
    }

    public function updatePPNotify($id, $nitifymsg, $ip, $nitifycall = 1) {
        $this->db->query("update " . DB_PREFIX . "pporder set 
       
        nitifydate='" . date("Y-m-d H:i:s") . "',
        nitifymsg='" . $this->db->escape($nitifymsg) . "',
        nitifycall='" . $nitifycall . "',
        notifyip='" . $this->db->escape($ip) . "'  
        
        where id=" . $id);
        return true;
    }

    public function updatePPCancel($id, $status, $ip) {
        $this->db->query("update " . DB_PREFIX . "pporder set 
       
        canceldate='" . date("Y-m-d H:i:s") . "',
        status='" . $status . "',
        cancelip='" . $this->db->escape($ip) . "'  
        
        where id=" . $id);
        return true;
    }

    public function updatePPCallBack($id, $callback, $ip) {
        $this->db->query("update " . DB_PREFIX . "pporder set 
       
        callbacktime='" . date("Y-m-d H:i:s") . "',
        callback='" . $callback . "',
        cancelip='" . $this->db->escape($ip) . "'  
        
        where id=" . $id);
        return true;
    }

    public function updatePPSuccess($id, $pptxnid, $ppresult, $status, $ip, $ppstatus, $payment_status) {
        $this->db->query("update " . DB_PREFIX . "pporder set 
        ppresult='" . $this->db->escape(json_encode($ppresult)) . "',
        ppdate='" . date("Y-m-d H:i:s") . "',
        status='" . $status . "',
        ppstatus='" . $ppstatus . "',
        payment_status='" . $payment_status . "',
        ppip='" . $ip . "',
        pptxnid='" . $this->db->escape($pptxnid) . "'  

        where id=" . $id);
        return true;
    }

    public function requestInfoByStripe($order_info) {

        $line_items = [
            'name' => 'Order No: ' . $order_info['order_id'],
            'description' => 'online payment',
            'amount' => $order_info['total'] * 100,
            'currency' => $order_info['currency_code'],
            'quantity' => 1,
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

        return $createParam;
    }

    public function createOrder($data) {

        $this->db->query("
                INSERT INTO " . DB_PREFIX . "pporder
                SET orderid = '" . $this->db->escape($data["orderid"]) . "',
                merchantid = '" . $this->db->escape($data['merchantid']) . "',
                siteid = '" . $this->db->escape($data['siteid']) . "',
                totalamount = '" . $this->db->escape($data['totalamount']) . "',
                currency = '" . $this->db->escape($data['currency']) . "',
                ordersn = '" . $this->db->escape($data['ordersn']) . "',
                payment_type = '" . $this->db->escape(intval($data['payment_type'])) . "', 
                addtime = '" . date("Y-m-d H:i:s") . "',
                result = '" . $this->db->escape(json_encode($data['result'])) . "',
                status = '" . (int)$data['status'] . "',
                domain = '" . (string)$data['domain'] . "',
                cancelurl = '" . (string)$data['cancel_url'] . "',
                callbackurl = '" . (string)$data['callback_url'] . "',
                notifyurl = '" . (string)$data['notify_url'] . "',
                ip = '" . (string)$data['ip'] . "',
                ua = '" . (string)$data['user_agent'] . "',
                ppresult = '',
                pptxnid = '',
                paydate = '',
                nitifymsg = '',
                nitifydate = '',
                nitifycall = '0',
                callback = '0'");

        $lastOrderId = $this->db->getLastId();

        return $lastOrderId;
    }

    public function getOrderByReferenceId($referenceId) {

        $order = $this->db->query("select * from  " . DB_PREFIX . "pporder  where orderid=" . $referenceId . " limit 1 ");
        if ($order->num_rows) {
            return $order->row;
        }
        return false;
    }

}
