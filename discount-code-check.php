<?php

session_start();

$user = $_SESSION["user"];

$code = $_POST['code'];

if ($code=="") {
    echo ("Error: No code provided.");
} else {

    include "connecton.php";

    $getCodeData = Database::search("SELECT * FROM `discount_code` WHERE `discount_code`.`code` = '" . $code . "';");

    if ($getCodeData->num_rows == 0) {
        echo ("Error: Invalid Code");
    } else {
        $CheckIsUse = Database::search("SELECT * FROM `discount_code_user` WHERE  `discount_code_user`.`discount_code_code` = '" . $code . "' AND `discount_code_user`.`users_username`='" . $user["username"] . "';");

        if ($CheckIsUse->num_rows == 0) {

            $row = $getCodeData->fetch_assoc();

            $_SESSION["discount"] = $row["price"];
            $_SESSION["code"] = $code;
            echo ("Discount added");
        } else {
            echo ("This code is already used");
            exit();
        }
    }
}
