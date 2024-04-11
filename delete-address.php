<?php

$id = $_POST["id"];

if ($id !== "") {

    include "connecton.php";

    Database::iud("DELETE FROM `user_address` WHERE `user_address`.`address_id` = '" . $id . "';");
    echo ("ok");
}

?>
