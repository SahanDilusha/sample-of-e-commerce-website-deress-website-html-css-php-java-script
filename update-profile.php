<?php 

session_start();

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$pn = $_POST["pn"];

if ($fname == "") {
    echo("Please enter your first name.");
}else if ($lname =="") {
    echo("Please enter your last name");
}else if ($pn == "") {
    echo("Please provide a phone number for contact.");
}else if (!preg_match("/^[0]{1}[7]{1}[01245678]{1}[0-9]{7}$/", $pn)) {
    echo ("Invalid mobile number");
}else {

    include("connecton.php");

    

    Database::iud("UPDATE `users` SET `users`.`first_name` = '".$fname."',`users`.`last_name`='".$lname."',`users`.`mobile` ='".$pn."'
    WHERE `users`.`username` = '".$_SESSION['user']["username"]."';");

    $_SESSION['user']["first_name"]= $fname;
    $_SESSION['user']["last_name"]= $lname;
    $_SESSION['user']["mobile"]= $pn;

    echo("ok");

}


?>