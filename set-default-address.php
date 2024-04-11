<?php 

$id = $_POST["id"];

if ($id!=="") {
    include "connecton.php";

    Database::iud("UPDATE `user_address` SET `user_address`.`stetus_stetus_id` = '2' WHERE `user_address`.`address_id` = '".$id."'");

    echo("ok");

}

?>