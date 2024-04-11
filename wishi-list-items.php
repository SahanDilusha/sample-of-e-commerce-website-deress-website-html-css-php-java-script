<?php

$getWishiItems = Database::search("SELECT * FROM `product` INNER JOIN `wishi_list` ON `product`.`id` = `wishi_list`.`product_id` WHERE `wishi_list`.`users_username` = '" . $user["username"] . "' 
AND `product`.`stetus_stetus_id` != '6';");

if ($getWishiItems->num_rows ==  0) {
?>

    <div class="col-12 d-flex flex-column justify-content-center align-items-center mt-5">
        <i class="bi bi-emoji-frown-fill text-danger fs-4"></i>
        <h3>No wishlist items yet.</h3>
        <a href="index.php" class="btn btn-outline-dark mt-2">Shop Now</a>
    </div>

    <?php
} else {

    for ($i = 0; $i < $getWishiItems->num_rows; $i++) {

        $row = $getWishiItems->fetch_assoc();

    ?>

        <div class="col-md-3 mt-3">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="product_image/img<?php echo ($row["id"]); ?>-1.png">
                        <img class="pic-2" src="product_image/img<?php echo ($row["id"]); ?>-2.png">
                    </a>

                    <?php

                    if ($row["product_discount"] !== "0") {

                    ?>
                        <span class="product-sale-label">sale!</span>
                    <?php
                    }

                    ?>

                    <ul class="social">
                        <li class="p-2 rounded-5 bg-white" onclick="deleteWishiItems(<?php echo ($row['id']); ?>)"><i class="bi bi-trash3"></i></li>
                    </ul>
                    <div class="product-rating d-flex justify-content-center flex-column align-items-center g-1">
                        <div class="rating d-flex gap-2 ">

                            <?php

                            if ($row["star"] >= 300) {
                            ?>
                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star-fill text-dark"></li>
                            <?php
                            } else if ($row["star"] >= 200 && $row["star"] <  250) {
                            ?>
                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                            <?php } else if ($row["star"] >= 150 && $row["star"] <  200) { ?>

                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                            <?php
                            } else if ($row["star"] >= 100 && $row["star"] <  150) { ?>

                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                            <?php
                            } else if ($row["star"] >= 50 && $row["star"] <  100) { ?>
                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                            <?php
                            } else if ($row["star"] >= 10 && $row["star"] <  50) { ?>
                                <li class="bi bi-star-fill text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                            <?php
                            } else { ?>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                                <li class="bi bi-star text-dark"></li>
                            <?php }  ?>

                        </div>
                        <button class="btn btn-outline-dark rounded-3 p-2 fs-6" onclick="addToCard(<?php echo ($row['id']); ?>);"> ADD TO CART </button>
                    </div>
                </div>
                <a class="text-decoration-none text-dark px-2" href="product-ditels.php?id=<?=$row['product_id']?>&name=<?=$row["product_name"]?>">
                    <small class="fs-6 fw-bold"><?php echo ($row["product_name"]); ?></small>
                    <div class="price"><span><?php if ($row["product_discount"] !== "0") {
                                                    echo ("$" . $row["product_price"]);
                                                } ?></span><?php if ($row["product_discount"] !== "0") {
                                                                echo ("$" . $row["product_price"] - ($row["product_price"] * ($row["product_discount"] / 100)));
                                                            } else {
                                                                echo ("$" . $row["product_price"]);
                                                            } ?> </div>
                </a>
            </div>
        </div>

<?php
    }
}

?>

<div class="toast toast-container position-fixed bottom-0 end-0 p-3 mb-4 bg-dark" role="alert" aria-live="assertive" aria-atomic="true" id="myToast">
    <div class="toast-header">
        <strong class="me-auto">message</strong>
        <small>Just Now</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        <label class="text-white" id="msg_l">Product added to cart successfully!</label>
    </div>
</div>