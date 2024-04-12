<?php

session_start();

$id = $_POST["id"];

if ($id !== "") {

    include "connecton.php";

    if (isset($_SESSION["address_id"])) {
        $_SESSION["address_id"]="";
    }

    Database::iud("DELETE FROM `user_address` WHERE `user_address`.`address_id` = '" . $id . "';");
    echo ("ok");
}

?>
