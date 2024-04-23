<?php

if (isset($_POST["id"])) {

    if (!empty($_POST["id"])) {
        include "connecton.php";

        Database::iud("UPDATE `invoice` SET `invoice`.`invoice_stetus` = '9' WHERE `invoice`.`invoice_id` = '" . $_POST["id"] . "';");
        echo ("ok");
    }
}
