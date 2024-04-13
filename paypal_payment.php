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
