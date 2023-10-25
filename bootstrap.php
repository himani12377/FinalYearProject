<?php

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require '/vendor/autoload.php';

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'client_id' => 'AU8TitNyYv12ygRa1Ek6c4zr0AywbO1OJ1XhMGrtgsTIbLj63BqAAYF1PwfPw0aW61NZ5TU6BmEjobpH',
    'client_secret' => 'ELmiejnK7Xa4C82O-XR8fup9OQgEn13um4YHvJTzVc5Z62fIHOyx27U0Pk4Mpw-1BHbDBkPdiOeOcakq',
    'return_url' => 'http://localhost/ProjectBlue/response.php',
    'cancel_url' => 'http://localhost/ProjectBlue/payment-cancelled.html'
];

// Database settings. Change these for your database configuration.
$dbConfig = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'name' => 'bluegroup'
];

$apiContext = getApiContext(
    $paypalConfig['client_id'], 
    $paypalConfig['client_secret'], 
    $enableSandbox);

/**
 * Set up a connection to the API
 *
 * @param string $clientId
 * @param string $clientSecret
 * @param bool   $enableSandbox Sandbox mode toggle, true for test payments
 * @return \PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret, $enableSandbox = true)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId, $clientSecret)
    );

    $apiContext->setConfig([
        'mode' => $enableSandbox ? 'sandbox' : 'live'
    ]);

    return $apiContext;
}
