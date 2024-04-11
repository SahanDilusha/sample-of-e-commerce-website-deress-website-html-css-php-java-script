<?php

include "connecton.php";

session_start();

$of = $_POST["of"];

if ($of == "1") {

    if ($_FILES['file']['tmp_name'] == null) {
        echo ("Please Select File");
    } else {

        $mime = mime_content_type($_FILES["file"]["tmp_name"]);

        $t = "";

        if ($mime == 'image/png') {
            $t = "ok";
        } else if ($mime == 'image/jpeg' || $mime == 'image/jpg') {
            $t = "ok";
        }

        if ($t != "") {

            $fileName = $_SESSION["user"]["username"] . ".png";

            move_uploaded_file($_FILES["file"]["tmp_name"], "profile_images/" . $fileName . "");

            $newWidth = 100; 
            $newHeight = 100; 

            if ($mime == 'image/png') {
                $src = imagecreatefrompng("profile_images/" . $fileName);
            } elseif ($mime == 'image/jpeg' || $mime == 'image/jpg') {
                $src = imagecreatefromjpeg("profile_images/" . $fileName);
            }

            $dest = imagecreatetruecolor($newWidth, $newHeight);

            imagecopyresampled($dest, $src, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($src), imagesy($src));

            imagepng($dest, "profile_images/" . $fileName);

            imagedestroy($src);
            imagedestroy($dest);

            Database::iud("UPDATE `users` SET `users`.`stetus_dp` = '1'
            WHERE `users`.`username` = '" . $_SESSION["user"]["username"] . "';");

            $_SESSION["user"]["stetus_dp"] = "1";

            echo ("ok");
        } else {
            echo "type_error";
        }
    }
    
} else if ($of == "2") {

    Database::iud("UPDATE `users` SET `users`.`stetus_dp` = '2'
    WHERE `users`.`username` = '" . $_SESSION["user"]["username"] . "';");

    $_SESSION["user"]["stetus_dp"] = "2";

    echo ("ok");
}

?>
