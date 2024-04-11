<?php 

include "connecton.php";

$otp=$_POST["otp"];

if (!isset($_COOKIE["otp_mail"])) {
    header("Location: http://localhost/MyShop/login.php");
} else if ($otp=="") {
    echo("Please enter OTP");
}else{

    $checkOtp=Database::search("SELECT * FROM `users` WHERE `users`.`email` = '".$_COOKIE["otp_mail"]."' AND `users`.`otp` = '".$otp."';");

    if ($checkOtp ->num_rows == 0) {
        echo("Account not fuond! Please check your mail again.");
    } else {
        echo("ok");
    }
}

?>