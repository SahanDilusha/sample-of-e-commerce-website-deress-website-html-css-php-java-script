<?php

session_start();

$holderName = $_POST["holderName"];
$cardNo = $_POST["cardNumber"];
$cvv = $_POST["cvv"];
$exm = $_POST["month"];
$exy = $_POST["year"];

// Visa card pattern (starts with 4 and has a length of 13, 16, or 19 digits)
$visaPattern = '/^4[0-9]{12}(?:[0-9]{3})?$/';

// Mastercard pattern (starts with 5 and has a length of 16 digits)
$mastercardPattern = '/^5[1-5][0-9]{14}$/';

if ($cardNo == "") {
    echo ("Card number is required.");
} else if ($holderName == "") {
    echo ("Holder name is required");
} else if ($cvv == "") {
    echo ("CVV number is  required");
} elseif (!preg_match('/^[0-9]+$/', $cvv)) {
    echo ("CVV umber is not valide");
} else if ($exm == "" || $exy == "") {
    echo ("Expiry date is required");
} else if (preg_match($visaPattern, $cardNo) || preg_match($mastercardPattern, $cardNo)) {

    include "connecton.php";

    $checkCard = Database::search("SELECT * FROM `user_card` WHERE `user_card`.`card_no` = '" . $cardNo . "' AND `user_card`.`users_username` = '" . $_SESSION["user"]["username"] . "';");

    if ($checkCard->num_rows == 0) {

        $cardType;

        if (preg_match($visaPattern, $cardNo)) {
            $cardType = '1';
        } elseif (preg_match($mastercardPattern, $cardNo)) {
            $cardType = '2';
        }

        Database::iud("INSERT INTO `user_card`(`card_no`,
        `cvv`,`h_name`,`ex_m`,`ex_y`,
        `card_type_card_type_id`,
        `users_username`)
        VALUES('" . $cardNo . "',
        '" . $cvv . "',
        '" . $holderName . "',
        '" . $exm . "',
        '" . $exy . "',
        '" . $cardType . "',
        '" . $_SESSION["user"]["username"] . "');");
    } else {
        echo ("This card is alrady  exist");
    }
} else {
    echo ('Card type is Unknown');
}
