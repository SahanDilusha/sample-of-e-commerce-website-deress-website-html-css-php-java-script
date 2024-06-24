<?php
session_start();

if (isset($_SESSION["user"])) {

    if (isset($_POST["text"],$_POST["rating"],$_POST["productId"])) {

        if (empty($_POST["text"])) {
            echo ("Please enter your review");
        } else {

            include "connecton.php";

            $reviewText = $_POST["text"];
            $minLength = 10; // Example minimum length
            $maxLength = 200; // Example maximum length

            if (strlen($reviewText) < $minLength || strlen($reviewText) > $maxLength) {
                echo ("Review must be between {$minLength} and {$maxLength} characters");
                exit();
            }

            
            Database::iud("INSERT INTO `reviews`(`reviews_text`,`date`,`users_username`,`product_id`,`re`,`stetus_stetus_id`) 
            VALUES('" . $_POST["text"] . "','" . date('Y-m-d H:i:s') . "','" . $_SESSION["user"]["username"] . "','" . $_POST["productId"] . "','" . $_POST["rating"] . "','7');");
            echo ("ok");
        }
    } else {
        echo ("Error: Try Again!");
    }
} else {
    header("Location: http://localhost/MyShop/login.php");
    exit();
}
