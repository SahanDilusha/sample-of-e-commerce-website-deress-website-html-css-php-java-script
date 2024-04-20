<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
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
    include "spinners.php";

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap Side Tab Example</title>
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="container-fluid min-vh-100 mt-5">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-3 mb-3">
                    <!-- Product Categories -->
                    <?php
                    $getCategories = Database::search("SELECT * FROM `main_category`;");

                    if ($getCategories->num_rows != 0) {
                    ?>
                        <div class="w-100 mb-4">
                            <h5>Product Categories:</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="categories" id="categories_all">
                                <label class="form-check-label" for="categories_all">All</label>
                            </div>
                            <?php
                            for ($i = 0; $i < $getCategories->num_rows; $i++) {
                                $row = $getCategories->fetch_assoc();
                            ?>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="categories" id="<?= "category" . $row['main_category_name']; ?>">
                                    <label class="form-check-label" for="<?= "category" . $row['main_category_name']; ?>"><?= $row['main_category_name']; ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <!-- Stay by -->
                    <div class="w-100 mb-4">
                        <h5>Stay by:</h5>
                        <select class="form-select w-75" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <!-- Filter by Price -->
                    <div class="w-100 mb-4">
                        <h5>Filter by Price:</h5>
                        <div class="d-flex gap-2">
                            <input class="form-control" type="text" id="minPrice" placeholder="min" />
                            <input class="form-control" type="text" id="maxPrice" placeholder="max" />
                        </div>
                        <button class="btn btn-dark mt-2">Apply</button>
                    </div>

                    <!-- Filter by Color -->
                    <?php
                    $getColor = Database::search("SELECT * FROM `product_colors`;");

                    if ($getColor->num_rows != 0) {
                    ?>
                        <div class="w-100 mb-4">
                            <h5>Filter by color:</h5>
                            <?php
                            for ($i = 0; $i < $getColor->num_rows; $i++) {
                                $row = $getColor->fetch_assoc();
                            ?>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" style="background-color: <?= $row['color_code'] ?>;" name="color" id="<?= "color_" . $row["colors_name"] ?>">
                                    <label class="form-check-label mx-3" for="<?= "color_" . $row["colors_name"] ?>"><?= $row["colors_name"] ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <!-- Filter by Size -->
                    <?php
                    $getSpiner = Database::search("SELECT * FROM `product_size`;");

                    if ($getSpiner->num_rows != 0) {
                    ?>
                        <div class="w-100 mb-4">
                            <h5>Filter by Size:</h5>
                            <?php
                            for ($i = 0; $i < $getSpiner->num_rows; $i++) {
                                $row = $getSpiner->fetch_assoc();
                            ?>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="size" id="<?= "size_" . $row['size_name']; ?>">
                                    <label class="form-check-label" for="<?= "size_" . $row['size_name']; ?>"><?= $row['size_name']; ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

                <!-- Product List -->
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-3 mt-3">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="#" class="image">
                                        <img class="pic-1" src="product_image/img1-1.png">
                                        <img class="pic-2" src="product_image/img1-2.png">
                                    </a>
                                    <span class="product-sale-label">sale!</span>
                                    <ul class="social">
                                        <li class="p-2 rounded-5 bg-white" onclick="deleteWishiItems()"><i class="bi bi-trash3"></i></li>
                                    </ul>
                                    <div class="product-rating d-flex justify-content-center flex-column align-items-center g-1">
                                        <div class="rating d-flex gap-2 ">
                                            <li class="bi bi-star-fill text-dark"></li>
                                            <li class="bi bi-star-fill text-dark"></li>
                                            <li class="bi bi-star-fill text-dark"></li>
                                            <li class="bi bi-star-fill text-dark"></li>
                                            <li class="bi bi-star-fill text-dark"></li>
                                        </div>
                                        <button class="btn btn-outline-dark rounded-3 p-2 fs-6" onclick="addToCart();">ADD TO CART</button>
                                    </div>
                                </div>
                                <a class="text-decoration-none text-dark px-2" href="product-ditels.php?id="></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php

        include "footer.php";

        ?>

    </body>

    </html>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>