<?php

include "connecton.php";

$msg = $_POST["msg"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$rid = $_POST["rid"];

if ($fname == "") {
    echo ("First name is required");
} elseif ($lname == "") {
    echo ("Last  name is required");
} elseif ($mobile == "") {
    echo ("Mobile number is required");
} else if (!preg_match("/^[0]{1}[7]{1}[01245678]{1}[0-9]{7}$/", $mobile)) {
    echo ("Invalid mobile number");
} elseif ($email == "") {
    echo ("Email address is required");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid email format");
} elseif ($rid == "0" || $rid == "") {
    echo ("Room type must be selected");
} else {

    Database::iud("INSERT INTO `message` (
        `message`.`text`,
        `message`.`date`,
        `message`.`fname`,
        `message`.`lname`,
        `message`.`mobile`,
        `message`.`email`,
        `message`.`stetus_stetus_id`,
        `message`.`request_type_request_type_id`) VALUES
        (
        '" . $msg . "',
        '" . date('Y-m-d H:i:s') . "',
        '" . $fname . "',
        '" . $lname . "',
        '" . $mobile . "',
        '" . $email . "',
        '7',
        '" . $rid . "'
        );");

    echo ("ok");
}
