<?php 

session_start();

if (isset($_SESSION["user"])) {

    if ($_POST["id"] =="") {
        echo("item not found!");
    }else{
        
        include "connecton.php";

        $checkCart = Database::search("SELECT * FROM `wishi_list` WHERE `wishi_list`.`users_username` = '".$_SESSION["user"]["username"]."' AND `wishi_list`.`product_id` = '".$_POST["id"]."';");
    
        if ($checkCart->num_rows == 0) {

           $getQTY= Database::search("SELECT `product`.`product_qty` FROM `product` WHERE `product`.`id` = '".$_POST["id"]."';");

           if ($getQTY->num_rows == 0) {
            echo("item not found!");
           }else {
            
                Database::iud("INSERT INTO `wishi_list`(`wishi_list`.`users_username`,`wishi_list`.`product_id`)VALUES('".$_SESSION["user"]["username"]."','".$_POST["id"]."');");
                echo("item add to  wishi list successfully!");
            }

        }else{
            echo("This item is already in your wishi list!");
        }
        
    }
        
}else{
    echo("Please Login to Continue Shopping");
}

?>