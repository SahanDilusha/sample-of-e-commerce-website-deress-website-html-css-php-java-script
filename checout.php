<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="icon" href="resources/image/Logo.png" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php
    include "navbar.php";
    if (!isset($_SESSION["user"])) {
        header("Location: http://localhost/MyShop/login.php");
        exit();
    } else {

    ?>



    <?php

        include "footer.php";
    }
    ?>

</body>