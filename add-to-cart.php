<?php 

session_start();

if (isset($_SESSION["user"])) {

    if ($_POST["id"] =="") {
        echo("item not found!");
    }else{
        
        include "connecton.php";

        $checkCart = Database::search("SELECT * FROM `cart` WHERE `cart`.`users_username` = '".$_SESSION["user"]["username"]."' AND `cart`.`product_id` = '".$_POST["id"]."';");
    
        if ($checkCart->num_rows == 0) {

           $getQTY= Database::search("SELECT `product`.`product_qty` FROM `product` WHERE `product`.`id` = '".$_POST["id"]."';");

           if ($getQTY->num_rows == 0) {
            echo("item not found!");
           }else {
            
            $qty = $getQTY->fetch_assoc()['product_qty'];

            if ($qty >= 2) {
                Database::iud("INSERT INTO `cart`(`cart`.`users_username`,`cart`.`product_id`)VALUES('".$_SESSION["user"]["username"]."','".$_POST["id"]."');");
                echo("item add to  cart successfully!");
            }else {
                echo("there is no item in stock");
            }

           }

        }else{
            echo("This item is already in your cart!");
        }
        
    }
        
}else{
    echo("Please Login to Continue Shopping");
}

?>