<?php
include "connecton.php";
session_start();

$id = $_POST["id"];
$me = $_POST["me"];
$total = $_SESSION["total"];
$user = $_SESSION["user"];
$cart = $_SESSION["cart"];

Database::iud("INSERT INTO `invoice` (`invoice_id`,
`date`,
`grand_total`,
`users_username`,
`invoice_stetus`,
`user_address_address_id`,
`method_id`,
`discount`) 
VALUES('" . $id . "',
'" . date('Y-m-d H:i:s') . "',
'" . $total["grandTotal"] . "',
'" . $user["users_username"] . "',
'1',
'" . $_SESSION["address_id"] . "',
'" . $me . "',
'" . $total["discount"] . "'
);");

$q = "INSERT INTO `invoice_items`(`qty`,`product_id`,`invoice_invoice_id`,`size_id`)";

for ($i = 0; $i < count($cart); $i++) {
    $obj = $cart[$i];
    $q = $q . "('" . $obj["qty"] . "','" . $obj["product_id"] . "','" . $id . "','" . $obj["size_id"] . "'),";
}

$q = $q . ";";

$q = str_replace('),;', ');', $q);


Database::iud($q);

echo ("ok");
