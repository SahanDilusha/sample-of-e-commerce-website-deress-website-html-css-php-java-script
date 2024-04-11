<?php
$card = $_POST["id"];

if ($card !== "") {
    session_start();
    include "connecton.php";

    Database::iud("DELETE FROM `user_card` WHERE `card_no` = '".$card."' AND `users_username` = '".$_SESSION["user"]["username"]."';");

    echo ("ok");
}
