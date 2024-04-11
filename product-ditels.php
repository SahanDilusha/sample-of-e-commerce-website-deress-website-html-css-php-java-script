<?php
if (!isset($_GET["id"]) || !isset($_GET["name"])) {
    header("location: http://localhost/MyShop/index.php");
    exit();
} else {

    $getId = $_GET["id"];
    $getname = $_GET["name"];

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $getname ?></title>
        <link rel="icon" href="resources/image/Logo.png" />
        <link rel="stylesheet" href="bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>

        <?php

        include "connecton.php";

        include  'navbar.php';

        $getProduct = Database::search("SELECT * FROM `product` INNER JOIN `material` ON `product`.`material_material_id` = `material`.`material_id` WHERE  `product`.`id` = '" . $getId . "';");

        if ($getProduct->num_rows ==  0) {
        ?>

            <div class="col-12 vh-100 d-flex flex-column justify-content-center align-items-center">
                <i class="bi bi-emoji-frown-fill text-danger fs-4"></i>
                <h3>No items yet.</h3>
                <a href="index.php" class="btn btn-outline-dark">Continue shopping?</a>
            </div>

        <?php
        } else {

            $row = $getProduct->fetch_assoc();

        ?>

            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                        <div class="p-3">
                            <img id="main-image" src="product_image/img<?php echo ($row["id"]); ?>-1.png" class="main-image" width="400px" />
                        </div>
                        <div class="mt-2 d-flex gap-2">
                            <img onclick="change_image(this)" src="product_image/img<?php echo ($row["id"]); ?>-1.png" class="main-image" width="70px" />
                            <img onclick="change_image(this)" src="product_image/img<?php echo ($row["id"]); ?>-2.png" class="main-image" width="70px" />
                            <img onclick="change_image(this)" src="product_image/img<?php echo ($row["id"]); ?>-3.png" class="main-image" width="70px" />
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column justify-content-start align-items-start p-3">
                        <?php
                        if ($row["product_qty"] == "0") {
                        ?>
                            <small class="p-1 text-bg-danger mb-1">Out of stock</small>
                        <?php } else if ($row["product_qty"] <= 5) {
                        ?>
                            <small class="p-1 text-bg-warning mb-1">Low stock</small>
                        <?php

                        } else { ?> <small class="p-1 text-bg-success mb-1">In stock</small> <?php } ?>

                        <h4 class="text-uppercase"><?php echo ($row["product_name"]); ?></h4>

                        <div class="rating d-flex gap-2 ">

                            <?php

                            $star = "";

                            if ($row["star"] >= 300) {
                                $star = "5.0";
                            ?>
                                <i class="bi bi-star-fill text-dark"></i>
                                <i class="bi bi-star-fill text-dark"></i>
                                <i class="bi bi-star-fill text-dark"></i>
                                <i class="bi bi-star-fill text-dark"></i>
                                <i class="bi bi-star-fill text-dark"></i>

                            <?php
                            } else if ($row["star"] >= 200 && $row["star"] <  250) {
                                $star = "4.0";
                            ?>
                                <i class="bi bi-star-fill text-dark"></i>
                                <i class="bi bi-star-fill text-dark"></i>
                                <i class="bi bi-star-fill text-dark"></i>
                                <i class="bi bi-star-fill text-dark"></i>
                                <i class="bi bi-star text-dark"></i>
                            <?php } else if ($row["star"] >= 150 && $row["star"] <  200) {
                                $star = "3.0";
                            ?>
                                <i class="bi bi-star-fill text-dark"></i>
                                <i class="bi bi-star-fill text-dark"></i>
                                <i class="bi bi-star-fill text-dark"></i>
                                <i class="bi bi-star text-dark"></i>
                                <i class="bi bi-star text-dark"></i>
                            <?php
                            } else if ($row["star"] >= 100 && $row["star"] <  150) {
                                $star = "2.0"; ?>

                                <i class="bi bi-star-fill text-dark"></i>
                                <i class="bi bi-star-fill text-dark"></i>
                                <li class="bi bi-star text-dark"></i>
                                    <i class="bi bi-star text-dark">
                                </li>
                                <i class="bi bi-star text-dark"></i>
                            <?php
                            } else if ($row["star"] >= 50 && $row["star"] <  100) {
                                $star = "1.0"; ?>
                                <i class="bi bi-star-fill text-dark"></li>
                                    <i class="bi bi-star text-dark"></i>
                                    <i class="bi bi-star text-dark"></i>
                                    <i class="bi bi-star text-dark"></i>
                                    <i class="bi bi-star text-dark"></i>
                                <?php
                            } else {
                                $star = "0.0"; ?>
                                    <i class="bi bi-star text-dark"></i>
                                    <i class="bi bi-star text-dark"></i>
                                    <i class="bi bi-star text-dark"></i>
                                    <i class="bi bi-star text-dark"></i>
                                    <i class="bi bi-star text-dark"></i>
                                    <i class="bi bi-star text-dark"></i>
                                <?php }  ?>
                                <label><?= $star ?> (<?= $row["star"]; ?> Reviews)</label>
                        </div>


                        <label class="fs-4">$80.00 <span class="text-decoration-line-through">$100.00</span></label>
                        <small class="mt-3"><?php echo ($row["product_description"]); ?></small>

                        <?php

                        $getColor = Database::search("SELECT * FROM `product_has_product_colors` INNER JOIN `product_colors` ON `product_has_product_colors`.`product_colors_colors_id` = `product_colors`.`colors_id`
                        WHERE `product_has_product_colors`.`product_id` = '" . $getId . "' AND `product_has_product_colors`.`color_stetus_id` = '1';");

                        $colorNames = "";
                        if ($getColor->num_rows !== 0) {

                        ?>

                            <label class="mt-3 fs-5 fw-bold">Colors</label>

                            <div class="d-flex gap-2">
                                <?php

                                for ($i = 0; $i < $getColor->num_rows; $i++) {

                                    $rowColor = $getColor->fetch_assoc();

                                    $colorNames = $colorNames . $rowColor["colors_name"] . ",";

                                ?>
                                    <div class="d-flex flex-column justify-content-center align-items-center mt-1">
                                        <input type="radio" name="color" id="color" value="<?= $rowColor["colors_id"]; ?>" <?php
                                                                                                                            if ($i == 0) {
                                                                                                                            ?> checked <?php
                                                                                                                                    }
                                                                                                                                        ?> />
                                        <div class="color-div form-check-input border border-dark-subtle rounded-3" style="background-color: <?= $rowColor["color_code"]; ?>;">
                                        </div>
                                        <label for="color"><small><?= $rowColor["colors_name"]; ?></small></label>
                                    </div>

                                <?php } ?>
                            </div>

                        <?php  }

                        $getSize =  Database::search("SELECT * FROM `product_size_has_product` INNER JOIN `product_size` ON 
                        `product_size_has_product`.`product_size_size_id` = `product_size`.`size_id` WHERE 
                        `product_size_has_product`.`product_id` = '" . $_GET["id"] . "' AND `product_size_has_product`.`size_stetus_id` = '1';");

                        $sizeNames = "";

                        if ($getSize->num_rows !== 0) {

                        ?>
                            <div class="mt-3">
                                <label class="mb-2 fs-5 fw-bold">Size</label>
                                <select class="form-select" id="size">
                                    <option selected>Select your size</option>
                                    <?php
                                    for ($i = 0; $i < $getSize->num_rows; $i++) {

                                        $rowSize = $getSize->fetch_assoc();

                                        $sizeNames = $sizeNames . $rowSize["size_name"] . ",";

                                    ?>
                                        <option value="<?= $rowSize["size_id"]; ?>"><?= $rowSize["size_name"]; ?></option>

                                    <?php } ?>
                                </select>
                            </div>

                        <?php

                        }

                        if ($row["product_qty"] !== "0") {
                        ?>

                            <div class=" mt-2">
                                <label class="mb-2 fs-5 fw-bold">Qty</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus" data-field="">
                                            <span class="bi bi-dash-lg"></span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="<?= $row["product_qty"]; ?>">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                            <span class="bi bi-plus-lg"></span>
                                        </button>
                                    </span>
                                    <samp class="mt-2 mx-2">stock - <?= $row["product_qty"]; ?></samp>
                                </div>

                            </div>

                        <?php } ?>

                        <div class="w-100 mt-3">

                            <?php

                            if ($row["product_qty"] == "0") {
                            ?>
                                <button class="btn btn-dark w-50" onclick="addToWishi(<?php echo ($getId); ?>);">Add to wishi list</button>
                                <?php
                                if (isset($_SESSION["user"])) {
                                ?>
                                    <button class="btn btn-info bi bi-chat-left-dots ms-2" data-bs-toggle="modal" data-bs-target="#request_modal"></button>
                                <?php
                                }
                            } else {
                                if (!isset($_SESSION["user"])) {
                                ?>
                                    <button class="btn btn-dark w-50" onclick="addToCart(<?= $getId ?>)">Add to cart</button>
                                    <?php
                                } else {
                                    $checkCart = Database::search("SELECT `product_id` FROM `cart` WHERE  `cart`.`product_id` = '" . $getId . "' AND `cart`.`users_username` = '" . $_SESSION["user"]["username"] . "';");

                                    if ($checkCart->num_rows == 0) {
                                    ?>
                                        <button class="btn btn-dark w-50" onclick="addToCart(<?= $getId ?>)">Add to cart</button>
                                    <?php
                                    } else {

                                    ?>
                                        <button class="btn btn-dark w-50">Update Cart</button>
                                    <?php

                                    }
                                }

                                if (isset($_SESSION["user"])) {

                                    ?>
                                    <button class="bi bi-heart btn btn-outline-dark ms-2" onclick="addToWishi(<?php echo ($getId); ?>);"></button>
                                    <button class="btn btn-info bi bi-chat-left-dots ms-2" data-bs-toggle="modal" data-bs-target="#request_modal"></button>
                            <?php

                                }
                            } ?>

                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-start align-items-start gap-3">
                        <button class="btn btn-dark" onclick="showDi(1)" id="d-btn">Descriptions</button>
                        <button class="btn border-bottom border-2" onclick="showDi(2)" id="ai-btn">Additional Information</button>
                        <button class="btn border-bottom border-2" onclick="showDi(3)" id="re-btn">Review</button>
                    </div>

                    <!-- Descriptions -->

                    <div class="p-3 col-12" id="des">
                        <p><?php echo ($row["product_description"]); ?></p>
                    </div>

                    <!-- Descriptions -->

                    <div class="p-3 col-md-7 d-none" id="addi">
                        <table class="table table-bordered">
                            <tbody>

                                <?php if ($colorNames !== "") {
                                ?>
                                    <tr>
                                        <td>Colors</td>
                                        <td><?= $colorNames; ?></td>
                                    </tr>

                                <?php  }

                                if ($sizeNames !== "") {
                                ?>
                                    <tr>
                                        <td>Size</td>
                                        <td><?= $sizeNames; ?></td>
                                    </tr>
                                <?php }
                                if ($row["material_id"] !== "1") { ?>
                                    <tr>
                                        <td>Material</td>
                                        <td><?= $row["material_name"]; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Customer Reviews -->

                    <div class="col-12 p-3 d-flex flex-column justify-content-start align-items-start d-none" id="cr">
                        <h4 class="jost-bold mb-4">Customer Reviews</h4>

                        <div class="d-flex gap-3">
                            <img src="profile_images/download.jpeg" class="rounded-5" width="50px" />
                            <div class="">
                                <small>Mark Williams</small>
                                <div>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                            </div>
                        </div>

                        <small class="mt-2 mb-2 px-2 fw-bold">Excellent Product, I love it 😍</small>

                        <small class="text-secondary mt-2 mb-2 px-2">dcjkdhckdsjhcvdcvjknjdscvknkvnckncvdnjvdncvncvnnjvkjdnjvdnjvnjdfvndnvkdjnjvefhw
                            b bbbcbcjvbnkcvbkfbvfbv</small>

                        <small class="px-2">Review by <small class="fw-bold">Krist</small>Posted on <small class="fw-bold">june
                                05, 2023</small></small>
                    </div>
                    <!-- Customer Reviews -->
                    <?php
                    if (isset($_SESSION["user"])) { ?>
                        <!-- Add your Review -->

                        <div class="col-md-8 d-flex  mt-3 d-none" id="ar">
                            <h4 class="jost-bold mb-4">Add your Review</h4>

                            <label class="form-label">Your Rating</label>

                            <div class="d-flex flex-column flex-lg-row gap-3 mb-2">
                                <div>
                                    <input type="checkbox" class="d-none" />
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                </div>

                                <div>
                                    <input type="checkbox" class="d-none" />
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                </div>

                                <div>
                                    <input type="checkbox" class="d-none" />
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                </div>

                                <div>
                                    <input type="checkbox" class="d-none" />
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                </div>
                                <div>
                                    <input type="checkbox" class="d-none" />
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                    <i class="bi bi-star text-dark fs-4 me-2"></i>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Your Review</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="mt-2 mb-2">
                                <button class="btn btn-dark p-2">Submit</button>
                            </div>
                        </div>
                </div>

                <!-- Add your Review -->

            <?php } ?>

            <!-- Related Product -->

            <div class="row w-100 mb-3">
                <div class="col-12 w-100">
                    <h3 class="jost-bold mt-5 mb-4 text-center">Related Product</h3>
                </div>

                <?php $getCategory = Database::search("SELECT `product_category`.`product_category_id` FROM `product_category` WHERE `product_category`.`product_id` = '" . $getId . "';");

                if ($getCategory->num_rows !== 0) {

                    $categoryId = $getCategory->fetch_assoc()["product_category_id"];

                    $getProduct = Database::search("SELECT * FROM `product` INNER JOIN `product_category` ON `product`.`id` = `product_category`.`product_id`
                    WHERE `product`.`id` !='" . $getId . "' AND `product_category`.`product_category_id` = '" . $categoryId . "' LIMIT 5;");

                    include "product-card.php";
                }

                ?>
            </div>

            </div>

            <!-- Related Product -->

            <?php
            if (isset($_SESSION["user"])) {
            ?>
                <!-- Modal -->
                <div class="modal fade" id="request_modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Get more details</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Request Type</label>
                                    <select class="form-select" id="RequestType">
                                        <option value="0" selected>Select</option>

                                        <?php $getType = Database::search("SELECT `request_type`.`request_type_name`,`request_type`.`request_type_id` FROM `request_type` WHERE `request_type`.`types_types_id` = '1';");

                                        if ($getType->num_rows !== 0) {

                                            for ($i = 0; $i < $getType->num_rows; $i++) {

                                                $type = $getType->fetch_assoc();

                                        ?>
                                                <option value="<?= $type["request_type_id"] ?>"><?= $type["request_type_name"] ?></option>
                                        <?php
                                            }
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Messenge</label>
                                    <textarea class="form-control" id="msg" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-dark" onclick="saveRequest(<?= $getId; ?>);">Send</button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

            </div>

    <?php
        }
        include "footer.php";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>
    </body>

    </html>