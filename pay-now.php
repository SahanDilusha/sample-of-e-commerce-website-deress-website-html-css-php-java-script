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

    if (!isset($_SESSION["user"]) && !isset($_SESSION["check"]) && !isset($_SESSION["address_id"]) && !isset($_SESSION["cart"]) && !isset($_SESSION["total"])) {
        header("Location: http://localhost/MyShop/index.php");
        exit;
    }

    ?>

    <div class="container min-vh-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-6 h-auto d-flex flex-column justify-content-center align-items-center">

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
                        <button class="btn btn-dark w-100 p-2" onclick="payCheck();">Place Order</button>
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
    <script src="https://www.paypal.com/sdk/js?client-id=AacVFATBU3IRA0tP72nBWr0RrEyEbB4W86RfNcDcf3lkLxZQfClcW7u356jjZV8n4rss4iDSLtHZ2NOP&disable-funding=credit,card"></script>
    <script src="script.js"></script>

    <script>
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
                            value: '10.00' // Replace with the amount you want to charge the customer
                        },
                        shipping: {
                            name: {
                                full_name: 'John Doe' // Customer's full name
                            },
                            address: {
                                address_line_1: '123 ABC Street', // Shipping address details
                                address_line_2: 'Apt 1',
                                admin_area_2: 'City',
                                admin_area_1: 'State',
                                postal_code: '12345',
                                country_code: 'US'
                            }
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                // Capture the funds from the transaction
                return actions.order.capture().then(function(details) {
                    // Handle successful capture
                    console.log('Transaction completed by ' + details.payer.name.given_name);

                    // Access shipping address
                    var shippingAddress = details.purchase_units[0].shipping.address;
                    console.log('Shipping Address:');
                    console.log('Line 1: ' + shippingAddress.address_line_1);
                    console.log('Line 2: ' + shippingAddress.address_line_2);
                    console.log('City: ' + shippingAddress.admin_area_2);
                    console.log('State: ' + shippingAddress.admin_area_1);
                    console.log('Postal Code: ' + shippingAddress.postal_code);
                    console.log('Country Code: ' + shippingAddress.country_code);

                    // Redirect or show success message
                    alert('Transaction completed successfully!');
                    // Example: Redirect to a success page
                    window.location.href = 'success.html';
                });
            }
        }).render('#paypal-button-container');
    </script>

</body>

</html>