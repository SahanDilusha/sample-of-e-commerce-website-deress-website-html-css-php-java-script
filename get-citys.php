<?php 

include "connecton.php";

$id =  $_GET["id"];

if ($id !=="") {
    $getCity=Database::search("SELECT * FROM `city` WHERE `district_district_id`='".$id."'");

    if ($getCity->num_rows !==0) {
    
        $array = array();
        
        for ($i=0; $i < $getCity->num_rows; $i++) { 
            
            $row=$getCity->fetch_assoc();
    
            $object=new stdClass();
    
            $object->city_id = $row["city_id"];
    
            $object->city_name = $row["city_name"];
    
            array_push( $array, $object);
    
        }
    
        echo(json_encode($array));
    
    }
}

?>