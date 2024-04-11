<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wishlist</title>
    <link rel="icon" href="resources/image/Logo.png" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php

    include "navbar.php";

    if (!isset($_SESSION["user"])) {
        header("Location: http://localhost/MyShop/login.php");
    } else {

        include "connecton.php";

        $user = $_SESSION["user"];

    ?>

        <div class="container min-vh-100">
            <div class="row mb-4">
                <div class="col-12 mt-4">
                    <h3 class="jost-bold">My Wishlist</h3>
                </div>

                <?php
                
                include "wishi-list-items.php";

                ?>

            </div>
        </div>

        <?php include  "footer.php"; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="script.js"></script>
</body>

</html>

<?php } ?>