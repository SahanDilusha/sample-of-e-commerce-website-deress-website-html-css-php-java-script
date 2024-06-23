<?php
include "connecton.php";

use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailerFile/src/Exception.php';
require 'PHPMailerFile/src/PHPMailer.php';
require 'PHPMailerFile/src/SMTP.php';

session_start();

$id = $_GET["id"];
$me = $_GET["me"];
$total = $_SESSION["total"];
$user = $_SESSION["user"];
$cart = $_SESSION["cart"];

$row = "";

Database::iud("INSERT INTO `invoice` (`invoice_id`,
`date`,
`grand_total`,
`users_username`,
`invoice_stetus`,
`user_address_address_id`,
`method_id`,
`discount`) 
VALUES('" . $id . "',
'" . date('Y-m-d H:i:s') . "',
'" . $total["grandTotal"] . "',
'" . $user["username"] . "',
'11',
'" . $_SESSION["address_id"] . "',
'" . $me . "',
'" . $total["discount"] . "'
);");

$q = "INSERT INTO `invoice_items`(`qty`,`product_id`,`invoice_invoice_id`,`size_id`) VALUES";

for ($i = 0; $i < count($cart); $i++) {
    $obj = $cart[$i];
    $row = $row . "  <tr>
    <td>" . $obj["product_name"] . "</td>
    <td>" . $obj["qty"] . "</td>
    <td>Rs. " . $obj["product_price"] . "</td>
    <td>Rs. " . $obj["product_price"] * $obj["qty"] . "</td>
</tr>";
    $q = $q . "('" . $obj["qty"] . "','" . $obj["product_id"] . "','" . $id . "','" . $obj["size_id"] . "'),";
}

$q = $q . ";";

$q = str_replace('),;', ');', $q);

Database::iud($q);

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'sdilusha34@gmail.com';
$mail->Password = 'pjfsvhvtyxoahcrv';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('sdilusha34@gmail.com');
$mail->addAddress($user["email"]);

$mail->isHTML(true);

$mail->Subject = 'Order Confirmation! ID - ' . $id;
$mail->Body = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #1f1f1f;
            margin: 0;
            padding: 20px;
            color: #ddd;
        }

        .email-container {
            max-width: 600px;
            margin: auto;
            background: #2c2c2c;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .logo {
            display: block;
            margin: auto;
            max-width: 150px;
            height: auto;
        }

        .email-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .order-success-icon {
            font-size: 36px;
            color: #28a745;
            margin-bottom: 10px;
            text-align: center;
        }

        .order-details {
            margin-top: 20px;
            border-top: 1px solid #444;
            padding-top: 10px;
        }

        .item-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .item-table th,
        .item-table td {
            border: 1px solid #444;
            padding: 8px;
            text-align: left;
            color: #fff;
        }

        .item-table th {
            background-color: #333;
            color: #fff;
        }

        .thank-you {
            margin-top: 20px;
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff;
            color: #000;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="email-container">
        <div class="email-header">
            <img class="logo" src="https://drive.google.com/file/d/1GPpLFakUnMWTBCKSth94Ubu6Mpykn3l7/view?usp=drive_link"
                alt="Your Company Logo">
            <h2 style="color: #fff;">Order Confirmation</h2>
        </div>

        <div class="order-success-icon">
            &#10004;
        </div>

        <p style="color: #ddd;">Dear ' . $user["first_name"] . ' ' . $user["last_name"] . ',</p>

        <p style="color: #ddd;">Your order has been successfully placed. Below are the details of your order:</p>

        <div class="order-details">
            <p style="color: #ddd;"><strong>Order ID:</strong> ' . $id . '</p>
            <p style="color: #ddd;"><strong>Order Total:</strong> Rs. ' . $total["grandTotal"] . '</p>
           
            <table class="item-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total(RS)</th>
                    </tr>
                </thead>
                <tbody>
                   ' . $row . '
                </tbody>
            </table>
        </div>

        <div class="thank-you">
            <p style="color: #ddd;">Thank you for shopping with us!</p>
            <a href="https://krist.com" class="button">Visit Our Website</a>
        </div>
    </div>

</body>

</html>';

if ($mail->send()) {

    setcookie("otp_mail", $email);
    unset($_SESSION["total"]);
    unset($_SESSION["cart"]);
    header("Location: http://localhost/MyShop/order-success.php?id=" . $id);
} else {
    echo 'Error sending email: ' . $mail->ErrorInfo;
}
