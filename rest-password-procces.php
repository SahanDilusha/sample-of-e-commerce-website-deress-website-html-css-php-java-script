<?php

include "connecton.php";

$newPassword = $_POST["newPassword"];
$coPassword = $_POST["coPassword"];

if (!isset($_COOKIE["otp_mail"])) {
    header("Location: http://localhost/MyShop/login.php");
} else if ($newPassword == "") {
    echo ("Please enter a new password.");
} else if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,45}$/', $newPassword)) {
    echo ("Invalid password!");
} else if ($coPassword == "") {
    echo ("Please confirm your new password.");
} else if ($newPassword !== $coPassword) {
    echo ("The passwords do not match. Please try again.");
} else {

    Database::iud("UPDATE `users` SET `users`.`password` = '".$newPassword."' WHERE `users`.`email` = '".$_COOKIE["otp_mail"]."';");

    echo("ok");

}

?>