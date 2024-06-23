<?php
include "connecton.php";
session_start();

$id = $_POST["id"];
$me = $_POST["me"];
$total = $_SESSION["total"];
$user = $_SESSION["user"];
$user = $_SESSION["cart"];

Database::iud("INSERT INTO `invoice` (`invoice_id`,
`date`,
`grand_total`,
`users_username`,
`invoice_stetus`,
`user_address_address_id`,
`method_id`,
`discount`) 
VALUES('" . $id . "',
'" . $total["grandTotal"] . "',
'" . $user["users_username"] . "',
'1',
'" . $_SESSION["address_id"] . "',
'" . $me . "',
'" . $total["discount"] . "'
);");
