<?php

// Function to fetch exchange rates from ExchangeRate-API
function fetchExchangeRates() {
    $api_key = '2ab7980327fb7f3f864a69a8'; // Replace with your API key
    $base_currency = 'USD';
    $url = "https://v6.exchangerate-api.com/v6/{$api_key}/latest/{$base_currency}";

    // Fetch data from API
    $response = file_get_contents($url);

    // Check if request was successful
    if ($response === false) {
        throw new Exception('Failed to fetch data from ExchangeRate-API');
    }

    // Decode JSON response
    $data = json_decode($response, true);

    // Check if decoding was successful
    if ($data === null || !isset($data['conversion_rates'])) {
        throw new Exception('Error decoding JSON from ExchangeRate-API');
    }

    return $data['conversion_rates'];
}

// Function to convert LKR to USD
function convertLKRtoUSD($lkr_amount, $exchange_rates) {
    // Check if LKR exchange rate is available
    if (!isset($exchange_rates['LKR'])) {
        throw new Exception('Exchange rate for LKR not found');
    }

    // Get the exchange rate for LKR to USD
    $lkr_to_usd_rate = $exchange_rates['LKR'];

    // Convert LKR to USD
    $usd_amount = $lkr_amount / $lkr_to_usd_rate;

    return $usd_amount;
}

try {
    // Fetch exchange rates
    $exchange_rates = fetchExchangeRates();

    // Example amount in LKR
    $lkr_amount = 1000; // Amount in LKR to convert to USD

    // Convert LKR to USD
    $usd_amount = convertLKRtoUSD($lkr_amount, $exchange_rates);

    // Display result
    echo "$lkr_amount LKR is equal to approximately $usd_amount USD";
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

?>
