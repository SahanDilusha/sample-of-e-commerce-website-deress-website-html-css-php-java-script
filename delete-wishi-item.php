<?php 

include "connecton.php";

session_start();

$id  = $_POST['id'];

if (isset($_SESSION["user"])) {

    if ($id !=="") {
        Database::iud("DELETE FROM `wishi_list` WHERE `wishi_list`.`product_id` = '".$id."' AND `wishi_list`.`users_username` ='".$_SESSION["user"]["username"]."'");
        echo("ok");
    }
    
}else{
    header('Location: login.html');
}

?>