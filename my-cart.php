<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="icon" href="resources/image/Logo.png" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php



    include "navbar.php";

    if (!isset($_SESSION["user"])) {
        header("Location: http://localhost/MyShop/login.php");
        exit();
    } else {
        include "connecton.php";

        $user = $_SESSION["user"];

        $getCart = Database::search("SELECT * FROM `cart` INNER JOIN `product_size` ON `product_size`.`size_id` = `cart`.`product_size_size_id` INNER JOIN `product` ON `cart`.`product_id` = `product`.`id` WHERE `cart`.`users_username` = '" . $user["username"] . "' AND 
        `product`.`stetus_stetus_id` != '6';");
    ?>

        <?php
        if ($getCart->num_rows == 0) {
        ?>
            <div class="col-12 min-vh-100 d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-emoji-frown-fill text-danger fs-4"></i>
                <h3>No items yet.</h3>

                <a href="index.php" class="btn btn-outline-dark">Continue Shopping</a>
            </div>

        <?php
        } else {
            $subtotal = 0;
            $deliveryCharge = 0;
            $grandTotal = 0;
            $discount = 0;

            if (isset($_SESSION["discount"])) {
                $discount += $_SESSION["discount"];
            }

        ?>

            <div class="container min-vh-100">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-md-9">
                            <h3 class="jost-bold">Checkout</h3>

                            <div class="ibox">
                                <div class="ibox-title">
                                    <span class="pull-right">(<strong><?php echo ($getCart->num_rows); ?></strong>) items</span>
                                    <h5>Items in your cart</h5>
                                </div>

                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table shoping-cart-table">
                                            <tbody>

                                                <?php

                                                $array = array();

                                                for ($i = 0; $i < $getCart->num_rows; $i++) {

                                                    $row  = $getCart->fetch_assoc();

                                                    array_push($array, $row);

                                                    $subtotal += $row['product_price'] * $row['qty'];

                                                    if ($row["product_discount"] != 0) {
                                                        $discount += $row["product_price"] * ($row["product_discount"] / 100);
                                                    }

                                                    if ($row["delivery"] != 0) {
                                                        $deliveryCharge += $row["delivery"];
                                                    }

                                                ?>

                                                    <tr>
                                                        <td width="90">
                                                            <img src="product_image/img<?php echo ($row["id"]); ?>-1.png" alt="" width="90px">
                                                        </td>
                                                        <td class="desc">
                                                            <h4>
                                                                <a href="product-ditels.php?id=<?php echo ($row["id"]); ?>&name=<?= $row["product_name"] ?>" class="text-dark fw-bold text-decoration-none fs-6">
                                                                    <?php echo ($row["product_name"]); ?>
                                                                </a>
                                                            </h4>
                                                            <p class="small">
                                                                <?php echo ($row["product_description"]); ?>
                                                            </p>
                                                            <dl class="small m-b-none">
                                                                <dt>Size : <?= $row["size_name"] ?></dt>
                                                            </dl>
                                                            <div class="m-t-sm">
                                                                <i class="text-muted" onclick="addToWishi(<?php echo ($row['id']); ?>);"><i class="bi bi-heart text-danger"></i> Add to wish</i>
                                                                |
                                                                <i class="text-muted" onclick="DeleteCartItem('<?php echo ($row['cart_item_id']); ?>');"><i class="bi bi-trash3 text-danger"></i> Remove item</i>
                                        
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?php

                                                            if ($row["product_discount"] != 0) {
                                                            ?>
                                                                Rs.<?= $row["product_price"] - ($row["product_price"] * ($row["product_discount"] / 100)) ?>
                                                                <s class="small text-muted">Rs. <?= $row['product_price'] ?></s>
                                                            <?php
                                                            } else {
                                                                echo ("Rs. " . $row["product_price"]);
                                                            }

                                                            ?>

                                                        </td>
                                                        <td width="100px">
                                                            <input type="number" class="form-control" min="1" max="10" value="<?= $row['qty'] ?>" disabled />
                                                        </td>
                                                        <td>
                                                            <h4>
                                                                <?= ($row["product_price"] - ($row["product_price"] * ($row["product_discount"] / 100))) * $row['qty'] ?>
                                                            </h4>
                                                        </td>
                                                    </tr>

                                                <?php  }
                                                $grandTotal = (($subtotal + $deliveryCharge) - $discount);

                                                $_SESSION["cart"] = $array;

                                                $_SESSION["total"] = [
                                                    "grandTotal" => $grandTotal,
                                                    "subtotal" => $subtotal,
                                                    "deliveryCharge" => $deliveryCharge,
                                                    "discount" => $discount,
                                                    "items" => $getCart->num_rows,
                                                ];
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="w-100 d-flex justify-content-between align-items-center border-bottom border-1">
                                <p class="fw-bold fs-5">Subtotal</p>
                                <p class="fw-bold fs-5">Rs. <?= $_SESSION["total"]["subtotal"]; ?></p>
                            </div>

                            <div class="p-1 w-100 mt-3">
                                <small>Enter Discount Code</small>
                                <div class="d-flex">
                                    <input type="text" class="form-control border border-black border-2 ms-1 mx-1" id="DiscountCode" value="<?php
                                                                                                                                            if (isset($_SESSION["code"])) {
                                                                                                                                                echo ($_SESSION["code"]);
                                                                                                                                            }
                                                                                                                                            ?>" />
                                    <button class="btn btn-dark " onclick="DiscountCodeCheck();">Apply</button>
                                </div>
                                <div class="w-100 mt-4 d-flex justify-content-between align-items-center border-bottom border-1">
                                    <p class="fs-6">Delivery Charge</p>
                                    <p class="fs-6">Rs. <?= $_SESSION["total"]["deliveryCharge"]; ?></p>
                                </div>
                                <div class="w-100 mt-4 d-flex justify-content-between align-items-center border-bottom border-1">
                                    <p class="fs-6">Discount</p>
                                    <p class="fs-6">Rs. <?= $_SESSION["total"]["discount"]; ?></p>
                                </div>
                            </div>
                            <div class="w-100 d-flex justify-content-between align-items-center border-bottom border-1">
                                <p class="fw-bold fs-5">Grand Total</p>
                                <p class="fw-bold fs-5">Rs. <?= $_SESSION["total"]["grandTotal"]; ?></p>
                            </div>

                            <div class="d-flex justify-content-center flex-column gap-2 align-items-center w-100 mt-2 mb-2">
                                <button class="btn btn-dark w-100 p-2" onclick="GoToCheckOut();">Proceed Checout</button>
                                <a href="index.php" class="btn btn-outline-dark w-100 p-2">Continue shopping</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="toast toast-container position-fixed bottom-0 end-0 p-3 mb-4 bg-dark" role="alert" aria-live="assertive" aria-atomic="true" id="myToast">
                <div class="toast-header">
                    <strong class="me-auto">message</strong>
                    <small>Just Now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <label class="text-white" id="msg_l"></label>
                </div>
            </div>

        <?php
        }
        ?>

        <?php

        include "footer.php";

        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <script src="script.js"></script>

    <?php } ?>
</body>

</html>