<?php

include "connecton.php";

session_start();

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];

if (!isset($fname)) {
    echo ("Please enter your first name");
}elseif (strlen($fname) > 45) {
    echo ("First name should not be more than 45 characters");
} else if (preg_match('/\d/', $fname)) {
    echo "The first name contains a number.";
} else if (!isset($lname)) {
    echo ("Please enter your lirst name");
}elseif (strlen($lname) > 45) {
    echo ("Last name should not be more than 45 characters");
} else if (preg_match('/\d/', $lname)) {
    echo "The last name contains a number.";
} else if (!isset($gender)) {
    echo ("Please select your gender");
} else if (!isset($email)) {
    echo ("Please enter your email");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid email format");
} else if (!isset($mobile)) {
    echo ("Please enter your mobile");
} else if (!preg_match("/^[0]{1}[7]{1}[01245678]{1}[0-9]{7}$/", $mobile)) {
    echo ("Invalid mobile number");
} else if (!isset($password)) {
    echo ("Password is required");
} else if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', $password)) {
    echo ("Invalid password");
} else {

    $checkUser = Database::search("SELECT * FROM `users` WHERE `users`.`email` = '" . $email . "' OR `users`.`mobile` = '" . $mobile . "';");

    if ($checkUser->num_rows == 0) {

        $username = strstr($email, '@', true);

        function generateOTP($length = 6)
        {
            $otp = '';

            for ($i = 0; $i < $length; $i++) {
                $otp .= mt_rand(0, 9);
            }
            return $otp;
        }

        $otp = generateOTP();

        Database::iud("INSERT INTO `users`(`username`,`first_name`,`last_name`,`email`,`otp`,`password`,`stetus_stetus_id`,`gender_gender_id`,`mobile`,`stetus_dp`,`r_date`) 
        VALUES('" . $username . "','" . $fname . "','" . $lname . "','" . $email . "','" . $otp . "','" . $password . "','1','" . $gender . "','" . $mobile . "','2','".date('Y-m-d H:i:s')."');");

        echo ("ok");
    } else {

        $row = $checkUser->fetch_assoc();

        if ($row["email"] == $email) {
            echo ('Email already exists');
        } else if ($row["mobile"] == $mobile) {

            echo ("Mobile number exists");
        }
    }
}
