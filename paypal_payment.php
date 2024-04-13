<?php
require 'vendor/autoload.php';

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

$apiContext = new ApiContext(
    new OAuthTokenCredential(
        'AaSXeM7MYc4pioutE9Km0zYFAQMz-FcUClCDkkeOKINLkj5VAHuAf_DKrvyPfR8QZ-qb5iGVKGFiY0t7',
        'AaSXeM7MYc4pioutE9Km0zYFAQMz-FcUClCDkkeOKINLkj5VAHuAf_DKrvyPfR8QZ-qb5iGVKGFiY0t7'
    )
);

$apiContext->setConfig(
    array(
        'mode' => 'sandbox',
        'log.LogEnabled' => true,
        'log.FileName' => 'PayPal.log',
        'log.LogLevel' => 'DEBUG',
        'cache.enabled' => true,
    )
);

$payer = new Payer();
$payer->setPaymentMethod('paypal');

$amount = new Amount();
$amount->setTotal('10.00'); // Replace with your amount
$amount->setCurrency('USD'); // Replace with your currency

$transaction = new Transaction();
$transaction->setAmount($amount);
$transaction->setDescription('Test Payment Description');

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl('http://yourdomain.com/execute_payment.php')
    ->setCancelUrl('http://yourdomain.com/cancel_payment.php');

$payment = new Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions([$transaction])
    ->setRedirectUrls($redirectUrls);

try {
    $payment->create($apiContext);

    $approvalUrl = $payment->getApprovalLink();
    header("Location: {$approvalUrl}");
    exit;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>