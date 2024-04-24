<?php

include "connecton.php";

if (isset($_POST["id"]) & isset($_POST["qty"])) {

    if (!empty($_POST["id"]) & !empty($_POST["qty"])) {
        Database::iud("UPDATE `cart` SET `cart`.`qty` = '" . $_POST["qty"] . "' WHERE `cart`.`cart_item_id` = '" . $_POST["id"] . "';");
        echo("ok");
    }
}

?>