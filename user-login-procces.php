<?php
include "connecton.php";

session_start();

$email = $_POST["email"];
$password = $_POST["password"];
$remember = $_POST["remember"];

if ($email == "") {
    echo ("Please enter your email!");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid email format!");
} else if ($password == "") {
    echo ("Password is required!");
} else if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,45}$/', $password)) {
    echo ("Invalid password!");
} else {

    $checkUser = Database::search("SELECT * FROM `users` WHERE `users`.`email` = '" . $email . "' AND `users`.`password` = '" . $password . "' AND `users`.`stetus_stetus_id` = '1';");

    if ($checkUser->num_rows == 0) {
        echo ("Invalid email or password!");
    } else {

        $_SESSION['user'] = $checkUser->fetch_assoc();

        if ($remember == "1") {
            setcookie("email", $email, time() + (60 * 60 * 24 * 365));
        } else {
            setcookie("email", "", -1);
        }

        echo ("ok");
    }
}