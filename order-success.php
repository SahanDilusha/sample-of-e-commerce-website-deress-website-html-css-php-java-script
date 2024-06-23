<?php

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: http://localhost/MyShop/index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
    <link rel="icon" href="resources/image/Logo.png" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php
    include "navbar.php";
    ?>

    <div class="container ">
        <div class="order-success-container mb-5 d-flex flex-column justify-content-center align-items-center text-center h-50 p-5">
            <div class="order-success-icon">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <h2 class="mb-4">Order Successfully Placed</h2>
            <p>Your order has been successfully placed. Thank you for shopping with us!</p>

            <div class="order-details">
                <h5>Order Details</h5>
                <p><strong>Order ID:</strong> <?= $_GET["id"]; ?></p>
            </div>

            <div class="mt-4">
                <a href="index.php" class="btn btn-dark">Continue Shopping</a>
            </div>
        </div>
    </div>

    <?php
    include "footer.php";
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>