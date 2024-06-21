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
}elseif (strlen($fname) > 45) {
    echo ("First name should not be more than 45 characters");
}else if (preg_match('/\d/', $fname)) {
    echo "The first name contains a number.";
} elseif ($lname == "") {
    echo ("Last  name is required");
}elseif (strlen($lname) > 45) {
    echo ("Last name should not be more than 45 characters");
}else if (preg_match('/\d/', $lname)) {
    echo "The last name contains a number.";
} elseif ($mobile == "") {
    echo ("Mobile number is required");
} else if (!preg_match("/^[0]{1}[7]{1}[01245678]{1}[0-9]{7}$/", $mobile)) {
    echo ("Invalid mobile number");
} elseif ($email == "") {
    echo ("Email address is required");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid email format");
}elseif (strlen($email)>100) {
    echo ("Email should not be more than 150 characters");
} elseif ($rid == "0" || $rid == "") {
    echo ("Message type must be selected");
}elseif (empty($msg)) {
    echo ("Message is required");
}elseif (strlen($msg)>150) {
    echo ("Message should not be more than 150 characters");
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
