<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="resources/image/Logo.png" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php
    include "navbar.php";
    include "spinners.php";

    if (!isset($_SESSION["user"]) || !isset($_SESSION["check"]) || !isset($_SESSION["address_id"]) || !isset($_SESSION["cart"]) || !isset($_SESSION["total"])) {
        header("Location: http://localhost/MyShop/index.php");
        exit;
    }

    // Function to fetch exchange rates from ExchangeRate-API
    function fetchExchangeRates()
    {
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
    function convertLKRtoUSD($lkr_amount, $exchange_rates)
    {
        // Check if LKR exchange rate is available
        if (!isset($exchange_rates['LKR'])) {
            throw new Exception('Exchange rate for LKR not found');
        }

        // Get the exchange rate for LKR to USD
        $lkr_to_usd_rate = $exchange_rates['LKR'];

        // Convert LKR to USD
        $usd_amount = $lkr_amount / $lkr_to_usd_rate;

        // Format to 2 decimal points
        $usd_amount_formatted = number_format($usd_amount, 2);

        return $usd_amount_formatted;
    }

    try {
        // Fetch exchange rates
        $exchange_rates = fetchExchangeRates();

        // Example amount in LKR
        $lkr_amount = $_SESSION["total"]["grandTotal"]; // Amount in LKR to convert to USD

        // Convert LKR to USD
        $usd_amount = convertLKRtoUSD($lkr_amount, $exchange_rates);
    ?>

        <div class="container min-vh-100">
            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="col-12 col-md-6 h-auto d-flex flex-column justify-content-center align-items-center">
                    <h2 class="mb-5">Please Order</h2>
                    <div class="w-100 d-flex justify-content-between align-items-center border-bottom border-1">
                        <p class="fw-bold fs-5">Order Id</p>
                        <p class="fw-bold fs-5"><?= $_SESSION["check"]["id"]; ?></p>
                    </div>

                    <div class="w-100 d-flex justify-content-between align-items-center border-bottom border-1">
                        <p class="fw-bold fs-5">Subtotal</p>
                        <p class="fw-bold fs-5">Rs. <?= $_SESSION["total"]["subtotal"]; ?></p>
                    </div>

                    <div class="p-1 w-100 mt-3">
                        <div class="w-100 mt-4 d-flex justify-content-between align-items-center border-bottom border-1">
                            <p class="fs-6">Total Items</p>
                            <p class="fs-6"><?= $_SESSION["total"]["items"]; ?></p>
                        </div>
                        <div class="w-100 mt-4 d-flex justify-content-between align-items-center border-bottom border-1">
                            <p class="fs-6">Delivery Charge</p>
                            <p class="fs-6">Rs. <?= $_SESSION["total"]["deliveryCharge"]; ?></p>
                        </div>
                        <div class="w-100 mt-4 d-flex justify-content-between align-items-center border-bottom border-1">
                            <p class="fs-6">Discount</p>
                            <p class="fs-6">Rs. <?= $_SESSION["total"]["discount"]; ?></p>
                        </div>
                    </div>
                    <div class="w-100 d-flex justify-content-between align-items-center border-bottom border-1">
                        <p class="fw-bold fs-5">Grand Total</p>
                        <p class="fw-bold fs-5">Rs. <?= $_SESSION["total"]["grandTotal"]; ?></p>
                    </div>

                    <div class="d-flex justify-content-center flex-column gap-2 align-items-center w-100 mt-2 mb-2">
                        <?php

                        if ($_SESSION["check"]["me"] == "1") {
                        ?>
                            <button class="btn btn-dark w-100 p-2" onclick="addInvoice('<?= $_SESSION['check']['id']; ?>');">Place Order</button>
                        <?php
                        } else {
                        ?>
                            <div id="paypal-button-container"></div>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include "footer.php";
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="script.js"></script>

        <script src="https://www.paypal.com/sdk/js?client-id=AacVFATBU3IRA0tP72nBWr0RrEyEbB4W86RfNcDcf3lkLxZQfClcW7u356jjZV8n4rss4iDSLtHZ2NOP&disable-funding=credit,card"></script>

        <script>
            function addInvoice(id) {
                const request = new XMLHttpRequest();
                const from = new FormData();

                request.onreadystatechange = function() {
                    if (request.readyState == "4" && request.status == "200") {
                        if (request.responseText === "ok") {
                            // You can handle the successful invoice addition here
                        } else {
                            // Handle the case when adding the invoice failed
                        }
                    }
                }

                request.open('GET', 'add-invoice.php?id=' + id, true);
                request.send();
            }

            <?php
            if ($_SESSION["check"]["me"] == "2") {
            ?>
                paypal.Buttons({
                    style: {
                        layout: 'vertical',
                        color: 'black',
                        shape: 'rect',
                        label: 'buynow'
                    },
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '<?= $usd_amount ?>', // Pass the formatted USD amount here
                                    currency_code: 'USD'
                                },
                                shipping: {
                                    name: {
                                        full_name: 'John Doe' // Customer's full name
                                    },
                                    address: {
                                        address_line_1: '123 ABC Street', // Shipping address details
                                        address_line_2: 'Apt 1',
                                        admin_area_2: 'Colombo', // City name in Sri Lanka
                                        admin_area_1: 'Western Province', // Province in Sri Lanka
                                        postal_code: '00500', // Postal code in Sri Lanka
                                        country_code: 'LK' // Country code for Sri Lanka
                                    }
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        // Capture the funds from the transaction
                        return actions.order.capture().then(function(details) {
                            addInvoice('<?= $_SESSION["check"]["id"]; ?>');
                            // Optionally, you can also notify the user of the successful payment
                            alert('Payment completed successfully!');
                        });
                    },
                    onCancel: function(data) {

                        if (confirm("Cancel order?") === true) {
                            window.location.replace('http://localhost/MyShop/cancelled.php');
                        }

                    }
                }).render('#paypal-button-container');
        </script>
    <?php } ?>

<?php
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
?>

</body>

</html>