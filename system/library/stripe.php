<?php

// File generated from our OpenAPI spec

// Stripe singleton
require(DIR_SYSTEM . 'library/stripe/Stripe.php');

// Utilities
require(DIR_SYSTEM . 'library/stripe/Util/CaseInsensitiveArray.php');
require(DIR_SYSTEM . 'library/stripe/Util/LoggerInterface.php');
require(DIR_SYSTEM . 'library/stripe/Util/DefaultLogger.php');
require(DIR_SYSTEM . 'library/stripe/Util/RandomGenerator.php');
require(DIR_SYSTEM . 'library/stripe/Util/RequestOptions.php');
require(DIR_SYSTEM . 'library/stripe/Util/Set.php');
require(DIR_SYSTEM . 'library/stripe/Util/Util.php');
require(DIR_SYSTEM . 'library/stripe/Util/ObjectTypes.php');

// HttpClient
require(DIR_SYSTEM . 'library/stripe/HttpClient/ClientInterface.php');
require(DIR_SYSTEM . 'library/stripe/HttpClient/CurlClient.php');

// Exceptions
require(DIR_SYSTEM . 'library/stripe/Exception/ExceptionInterface.php');
require(DIR_SYSTEM . 'library/stripe/Exception/ApiErrorException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/ApiConnectionException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/AuthenticationException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/BadMethodCallException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/CardException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/IdempotencyException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/InvalidArgumentException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/InvalidRequestException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/PermissionException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/RateLimitException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/SignatureVerificationException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/UnexpectedValueException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/UnknownApiErrorException.php');

// OAuth exceptions
require(DIR_SYSTEM . 'library/stripe/Exception/OAuth/ExceptionInterface.php');
require(DIR_SYSTEM . 'library/stripe/Exception/OAuth/OAuthErrorException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/OAuth/InvalidClientException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/OAuth/InvalidGrantException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/OAuth/InvalidRequestException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/OAuth/InvalidScopeException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/OAuth/UnknownOAuthErrorException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/OAuth/UnsupportedGrantTypeException.php');
require(DIR_SYSTEM . 'library/stripe/Exception/OAuth/UnsupportedResponseTypeException.php');

// API operations
require(DIR_SYSTEM . 'library/stripe/ApiOperations/All.php');
require(DIR_SYSTEM . 'library/stripe/ApiOperations/Create.php');
require(DIR_SYSTEM . 'library/stripe/ApiOperations/Delete.php');
require(DIR_SYSTEM . 'library/stripe/ApiOperations/NestedResource.php');
require(DIR_SYSTEM . 'library/stripe/ApiOperations/Request.php');
require(DIR_SYSTEM . 'library/stripe/ApiOperations/Retrieve.php');
require(DIR_SYSTEM . 'library/stripe/ApiOperations/Update.php');

// Plumbing
require(DIR_SYSTEM . 'library/stripe/ApiResponse.php');
require(DIR_SYSTEM . 'library/stripe/RequestTelemetry.php');
require(DIR_SYSTEM . 'library/stripe/StripeObject.php');
require(DIR_SYSTEM . 'library/stripe/ApiRequestor.php');
require(DIR_SYSTEM . 'library/stripe/ApiResource.php');
require(DIR_SYSTEM . 'library/stripe/SingletonApiResource.php');
require(DIR_SYSTEM . 'library/stripe/Service/AbstractService.php');
require(DIR_SYSTEM . 'library/stripe/Service/AbstractServiceFactory.php');

// StripeClient
require(DIR_SYSTEM . 'library/stripe/StripeClientInterface.php');
require(DIR_SYSTEM . 'library/stripe/BaseStripeClient.php');
require(DIR_SYSTEM . 'library/stripe/StripeClient.php');

// Stripe API Resources
require(DIR_SYSTEM . 'library/stripe/Account.php');
require(DIR_SYSTEM . 'library/stripe/AccountLink.php');
require(DIR_SYSTEM . 'library/stripe/AlipayAccount.php');
require(DIR_SYSTEM . 'library/stripe/ApplePayDomain.php');
require(DIR_SYSTEM . 'library/stripe/ApplicationFee.php');
require(DIR_SYSTEM . 'library/stripe/ApplicationFeeRefund.php');
require(DIR_SYSTEM . 'library/stripe/Balance.php');
require(DIR_SYSTEM . 'library/stripe/BalanceTransaction.php');
require(DIR_SYSTEM . 'library/stripe/BankAccount.php');
require(DIR_SYSTEM . 'library/stripe/BillingPortal/Session.php');
require(DIR_SYSTEM . 'library/stripe/BitcoinReceiver.php');
require(DIR_SYSTEM . 'library/stripe/BitcoinTransaction.php');
require(DIR_SYSTEM . 'library/stripe/Capability.php');
require(DIR_SYSTEM . 'library/stripe/Card.php');
require(DIR_SYSTEM . 'library/stripe/Charge.php');
require(DIR_SYSTEM . 'library/stripe/Checkout/Session.php');
require(DIR_SYSTEM . 'library/stripe/Collection.php');
require(DIR_SYSTEM . 'library/stripe/CountrySpec.php');
require(DIR_SYSTEM . 'library/stripe/Coupon.php');
require(DIR_SYSTEM . 'library/stripe/CreditNote.php');
require(DIR_SYSTEM . 'library/stripe/CreditNoteLineItem.php');
require(DIR_SYSTEM . 'library/stripe/Customer.php');
require(DIR_SYSTEM . 'library/stripe/CustomerBalanceTransaction.php');
require(DIR_SYSTEM . 'library/stripe/Discount.php');
require(DIR_SYSTEM . 'library/stripe/Dispute.php');
require(DIR_SYSTEM . 'library/stripe/EphemeralKey.php');
require(DIR_SYSTEM . 'library/stripe/ErrorObject.php');
require(DIR_SYSTEM . 'library/stripe/Event.php');
require(DIR_SYSTEM . 'library/stripe/ExchangeRate.php');
require(DIR_SYSTEM . 'library/stripe/File.php');
require(DIR_SYSTEM . 'library/stripe/FileLink.php');
require(DIR_SYSTEM . 'library/stripe/Invoice.php');
require(DIR_SYSTEM . 'library/stripe/InvoiceItem.php');
require(DIR_SYSTEM . 'library/stripe/InvoiceLineItem.php');
require(DIR_SYSTEM . 'library/stripe/Issuing/Authorization.php');
require(DIR_SYSTEM . 'library/stripe/Issuing/Card.php');
require(DIR_SYSTEM . 'library/stripe/Issuing/CardDetails.php');
require(DIR_SYSTEM . 'library/stripe/Issuing/Cardholder.php');
require(DIR_SYSTEM . 'library/stripe/Issuing/Dispute.php');
require(DIR_SYSTEM . 'library/stripe/Issuing/Transaction.php');
require(DIR_SYSTEM . 'library/stripe/LineItem.php');
require(DIR_SYSTEM . 'library/stripe/LoginLink.php');
require(DIR_SYSTEM . 'library/stripe/Mandate.php');
require(DIR_SYSTEM . 'library/stripe/Order.php');
require(DIR_SYSTEM . 'library/stripe/OrderItem.php');
require(DIR_SYSTEM . 'library/stripe/OrderReturn.php');
require(DIR_SYSTEM . 'library/stripe/PaymentIntent.php');
require(DIR_SYSTEM . 'library/stripe/PaymentMethod.php');
require(DIR_SYSTEM . 'library/stripe/Payout.php');
require(DIR_SYSTEM . 'library/stripe/Person.php');
require(DIR_SYSTEM . 'library/stripe/Plan.php');
require(DIR_SYSTEM . 'library/stripe/Price.php');
require(DIR_SYSTEM . 'library/stripe/Product.php');
require(DIR_SYSTEM . 'library/stripe/PromotionCode.php');
require(DIR_SYSTEM . 'library/stripe/Radar/EarlyFraudWarning.php');
require(DIR_SYSTEM . 'library/stripe/Radar/ValueList.php');
require(DIR_SYSTEM . 'library/stripe/Radar/ValueListItem.php');
require(DIR_SYSTEM . 'library/stripe/Recipient.php');
require(DIR_SYSTEM . 'library/stripe/RecipientTransfer.php');
require(DIR_SYSTEM . 'library/stripe/Refund.php');
require(DIR_SYSTEM . 'library/stripe/Reporting/ReportRun.php');
require(DIR_SYSTEM . 'library/stripe/Reporting/ReportType.php');
require(DIR_SYSTEM . 'library/stripe/Review.php');
require(DIR_SYSTEM . 'library/stripe/SetupAttempt.php');
require(DIR_SYSTEM . 'library/stripe/SetupIntent.php');
require(DIR_SYSTEM . 'library/stripe/Sigma/ScheduledQueryRun.php');
require(DIR_SYSTEM . 'library/stripe/SKU.php');
require(DIR_SYSTEM . 'library/stripe/Source.php');
require(DIR_SYSTEM . 'library/stripe/SourceTransaction.php');
require(DIR_SYSTEM . 'library/stripe/Subscription.php');
require(DIR_SYSTEM . 'library/stripe/SubscriptionItem.php');
require(DIR_SYSTEM . 'library/stripe/SubscriptionSchedule.php');
require(DIR_SYSTEM . 'library/stripe/TaxId.php');
require(DIR_SYSTEM . 'library/stripe/TaxRate.php');
require(DIR_SYSTEM . 'library/stripe/Terminal/ConnectionToken.php');
require(DIR_SYSTEM . 'library/stripe/Terminal/Location.php');
require(DIR_SYSTEM . 'library/stripe/Terminal/Reader.php');
require(DIR_SYSTEM . 'library/stripe/ThreeDSecure.php');
require(DIR_SYSTEM . 'library/stripe/Token.php');
require(DIR_SYSTEM . 'library/stripe/Topup.php');
require(DIR_SYSTEM . 'library/stripe/Transfer.php');
require(DIR_SYSTEM . 'library/stripe/TransferReversal.php');
require(DIR_SYSTEM . 'library/stripe/UsageRecord.php');
require(DIR_SYSTEM . 'library/stripe/UsageRecordSummary.php');
require(DIR_SYSTEM . 'library/stripe/WebhookEndpoint.php');

// Services
require(DIR_SYSTEM . 'library/stripe/Service/AccountService.php');
require(DIR_SYSTEM . 'library/stripe/Service/AccountLinkService.php');
require(DIR_SYSTEM . 'library/stripe/Service/ApplePayDomainService.php');
require(DIR_SYSTEM . 'library/stripe/Service/ApplicationFeeService.php');
require(DIR_SYSTEM . 'library/stripe/Service/BalanceService.php');
require(DIR_SYSTEM . 'library/stripe/Service/BalanceTransactionService.php');
require(DIR_SYSTEM . 'library/stripe/Service/BillingPortal/SessionService.php');
require(DIR_SYSTEM . 'library/stripe/Service/ChargeService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Checkout/SessionService.php');
require(DIR_SYSTEM . 'library/stripe/Service/CountrySpecService.php');
require(DIR_SYSTEM . 'library/stripe/Service/CouponService.php');
require(DIR_SYSTEM . 'library/stripe/Service/CreditNoteService.php');
require(DIR_SYSTEM . 'library/stripe/Service/CustomerService.php');
require(DIR_SYSTEM . 'library/stripe/Service/DisputeService.php');
require(DIR_SYSTEM . 'library/stripe/Service/EphemeralKeyService.php');
require(DIR_SYSTEM . 'library/stripe/Service/EventService.php');
require(DIR_SYSTEM . 'library/stripe/Service/ExchangeRateService.php');
require(DIR_SYSTEM . 'library/stripe/Service/FileService.php');
require(DIR_SYSTEM . 'library/stripe/Service/FileLinkService.php');
require(DIR_SYSTEM . 'library/stripe/Service/InvoiceService.php');
require(DIR_SYSTEM . 'library/stripe/Service/InvoiceItemService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Issuing/AuthorizationService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Issuing/CardService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Issuing/CardholderService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Issuing/DisputeService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Issuing/TransactionService.php');
require(DIR_SYSTEM . 'library/stripe/Service/MandateService.php');
require(DIR_SYSTEM . 'library/stripe/Service/OrderService.php');
require(DIR_SYSTEM . 'library/stripe/Service/OrderReturnService.php');
require(DIR_SYSTEM . 'library/stripe/Service/PaymentIntentService.php');
require(DIR_SYSTEM . 'library/stripe/Service/PaymentMethodService.php');
require(DIR_SYSTEM . 'library/stripe/Service/PayoutService.php');
require(DIR_SYSTEM . 'library/stripe/Service/PlanService.php');
require(DIR_SYSTEM . 'library/stripe/Service/PriceService.php');
require(DIR_SYSTEM . 'library/stripe/Service/ProductService.php');
require(DIR_SYSTEM . 'library/stripe/Service/PromotionCodeService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Radar/EarlyFraudWarningService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Radar/ValueListService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Radar/ValueListItemService.php');
require(DIR_SYSTEM . 'library/stripe/Service/RefundService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Reporting/ReportRunService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Reporting/ReportTypeService.php');
require(DIR_SYSTEM . 'library/stripe/Service/ReviewService.php');
require(DIR_SYSTEM . 'library/stripe/Service/SetupAttemptService.php');
require(DIR_SYSTEM . 'library/stripe/Service/SetupIntentService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Sigma/ScheduledQueryRunService.php');
require(DIR_SYSTEM . 'library/stripe/Service/SkuService.php');
require(DIR_SYSTEM . 'library/stripe/Service/SourceService.php');
require(DIR_SYSTEM . 'library/stripe/Service/SubscriptionService.php');
require(DIR_SYSTEM . 'library/stripe/Service/SubscriptionItemService.php');
require(DIR_SYSTEM . 'library/stripe/Service/SubscriptionScheduleService.php');
require(DIR_SYSTEM . 'library/stripe/Service/TaxRateService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Terminal/ConnectionTokenService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Terminal/LocationService.php');
require(DIR_SYSTEM . 'library/stripe/Service/Terminal/ReaderService.php');
require(DIR_SYSTEM . 'library/stripe/Service/TokenService.php');
require(DIR_SYSTEM . 'library/stripe/Service/TopupService.php');
require(DIR_SYSTEM . 'library/stripe/Service/TransferService.php');
require(DIR_SYSTEM . 'library/stripe/Service/WebhookEndpointService.php');

// Service factories
require(DIR_SYSTEM . 'library/stripe/Service/CoreServiceFactory.php');
require(DIR_SYSTEM . 'library/stripe/Service/BillingPortal/BillingPortalServiceFactory.php');
require(DIR_SYSTEM . 'library/stripe/Service/Checkout/CheckoutServiceFactory.php');
require(DIR_SYSTEM . 'library/stripe/Service/Issuing/IssuingServiceFactory.php');
require(DIR_SYSTEM . 'library/stripe/Service/Radar/RadarServiceFactory.php');
require(DIR_SYSTEM . 'library/stripe/Service/Reporting/ReportingServiceFactory.php');
require(DIR_SYSTEM . 'library/stripe/Service/Sigma/SigmaServiceFactory.php');
require(DIR_SYSTEM . 'library/stripe/Service/Terminal/TerminalServiceFactory.php');

// OAuth
require(DIR_SYSTEM . 'library/stripe/OAuth.php');
require(DIR_SYSTEM . 'library/stripe/OAuthErrorObject.php');
require(DIR_SYSTEM . 'library/stripe/Service/OAuthService.php');

// Webhooks
require(DIR_SYSTEM . 'library/stripe/Webhook.php');
require(DIR_SYSTEM . 'library/stripe/WebhookSignature.php');

class Stripe {

}
