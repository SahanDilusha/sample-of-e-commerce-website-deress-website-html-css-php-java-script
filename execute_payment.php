<?php
require 'vendor/autoload.php';

use PayPal\Api\PaymentExecution;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payment;


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

if (isset($_GET['paymentId']) && isset($_GET['PayerID'])) {
    $paymentId = $_GET['paymentId'];
    $payerId = $_GET['PayerID'];

    $payment = Payment::get($paymentId, $apiContext);

    $execution = new PaymentExecution();
    $execution->setPayerId($payerId);

    try {
        $result = $payment->execute($execution, $apiContext);
        echo "Payment Successful!";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Payment was not successful.";
}
?>
