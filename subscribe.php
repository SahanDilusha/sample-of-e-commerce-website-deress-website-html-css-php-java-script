<?php

$email = $_POST["email"];

if ($email == '') {
    echo ("Please enter your email");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid email format");
} else {

    include "connecton.php";

    $checkEmail = Database::search("SELECT * FROM `subscribe` WHERE `subscribe`.`email` = '" . $email . "';");

    if ($checkEmail->num_rows == 0) {
        Database::iud("INSERT INTO `subscribe`(`subscribe`.`email`) VALUE('".$email."');");
        echo("You have successfully subscribed to our newsletter.");
    }else{
        echo("This Email is already subscribed.");
    }
}
