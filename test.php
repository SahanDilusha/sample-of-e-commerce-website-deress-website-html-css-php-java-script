<!-- echo date('Y-m-d H:i:s'); -->

<?php
session_start();


for ($i = 0; $i < count($_SESSION["cart"]); $i++) {
    echo json_encode($_SESSION["cart"][$i]);
}
?>