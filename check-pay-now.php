<?php
session_start();

if (isset($_SESSION["user"]) && isset($_SESSION["address_id"]) && isset($_GET["me"]) && isset($_SESSION["cart"]) && isset($_SESSION["total"])) {

    if ($_GET["me"] == "" ) {
        echo ("no");
    } else {

        function generateUniqueNumber() {
            $uniqueId = uniqid();
            $numericPart = substr(preg_replace("/[^0-9]/", "", $uniqueId), 0, 8);
            $uniqueNumber = str_pad($numericPart, 8, "0", STR_PAD_LEFT);
            return $uniqueNumber;
        }

        $_SESSION["check"] = [
            "id" => generateUniqueNumber(),
            "me" => $_GET["me"],
        ];

        echo "ok";
    }
} else {
    echo ("no");
}
