<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailerFile/src/Exception.php';
require 'PHPMailerFile/src/PHPMailer.php';
require 'PHPMailerFile/src/SMTP.php';

include "connecton.php";

$email = $_POST["email"];

if ($email == "") {
    echo ("Please enter your email");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email format");
} else {

    $checkEmail = Database::search("SELECT `otp` FROM `users` WHERE `users`.`email` = '" . $email . "';");

    if ($checkEmail->num_rows == 0) {

        echo ("This email is not registered with us.");

    } else {

        $row = $checkEmail->fetch_assoc();

        $getOtp = $row["otp"];

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sdilusha34@gmail.com';
        $mail->Password = 'pjfsvhvtyxoahcrv';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('sdilusha34@gmail.com');
        $mail->addAddress('sahancodelygroup@gmail.com');

        $mail->isHTML(true);

        $mail->Subject = 'Reset Your Password This OTP';
        $mail->Body = '<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Password Reset OTP Email</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }
        
                .container {
                    max-width: 600px;
                    margin: 20px auto;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
        
                h2 {
                    color: #333;
                }
        
                p {
                    color: #666;
                }
        
                .otp-code {
                    font-size: 24px;
                    color: #007bff;
                    margin-bottom: 20px;
                }
        
                .footer {
                    margin-top: 20px;
                    border-top: 1px solid #ccc;
                    padding-top: 10px;
                    color: #666;
                    font-size: 14px;
                    text-align: center;
                }
            </style>
        </head>
        
        <body>
            <div class="container">
                <h2>Password Reset OTP</h2>
                <p>Please use the following One-Time Password (OTP) to reset your password:</p>
                <p class="otp-code">' . $getOtp . '</p>
                <p>If you did not request a password reset, you can safely ignore this email.</p>
                <div class="footer">
                    This email was sent by <strong>Krist</strong>.<br>
                    &copy; ' . date("Y") . ' Your Company. All rights reserved.
                </div>
            </div>
        </body>
        
        </html>';

        if ($mail->send()) {

            setcookie("otp_mail",$email);

            echo 'ok';
            
        } else {
            echo 'Error sending email: ' . $mail->ErrorInfo;
        }

    }
}



?>