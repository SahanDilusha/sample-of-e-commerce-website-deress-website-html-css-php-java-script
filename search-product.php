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

                <div class="col-md-3 mb-3">

                    <?php

                    $getCategories = Database::search("SELECT * FROM `main_category` ;");

                    if ($getCategories->num_rows != 0) {

                    ?>

                        <div class="w-100 mb-4">
                            <h5>Product Categories:</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="categories" id="categories_all">
                                <label class="form-check-label" for="categories_all">
                                    All
                                </label>
                            </div>

                            <?php
                            for ($i = 0; $i < $getCategories->num_rows; $i++) {
                                $row = $getCategories->fetch_assoc();

                            ?>

                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="categories" id="<?=  "category".$row['main_category_name']; ?>">
                                    <label class="form-check-label" for="<?=  "category".$row['main_category_name']; ?>">
                                        <?=  $row['main_category_name']; ?>
                                    </label>
                                </div>

                            <?php } ?>

                        </div>

                    <?php  } ?>

                    <div class="w-100 mb-4">
                        <h5>Stay by:</h5>
                        <select class="form-select w-50" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="w-100 mb-4">
                        <h5>Filter by Price:</h5>
                        <div class="d-flex gap-2">
                            <input class="form-control" type="text" id="rangeInput" value="" placeholder="min" />
                            <input class="form-control" type="text" id="rangeInput" value="" placeholder="max" />
                        </div>
                        <button class="btn btn-dark mt-2">Apply</button>
                    </div>

                    <?php

                    $getColor = Database::search("SELECT * FROM `product_colors`;");

                    if ($getColor->num_rows != 0) {


                    ?>

                        <!-- Filter by color section -->
                        <div class="w-100 mb-4">
                            <!-- Heading for the filter by color section -->
                            <h5>Filter by color:</h5>

                            <?php
                            for ($i = 0; $i < $getColor->num_rows; $i++) {
                                $row = $getColor->fetch_assoc();
                            ?>

                                <div class="form-check mb-2">
                                    <input class="form-check-input p-3" type="radio" style="background-color: <?= $row['color_code'] ?>;" name="color" id="<?= "color_" . $row["colors_name"] ?>">
                                    <label class="form-check-label mx-3 mt-2" for="<?= "color_" . $row["colors_name"] ?>">
                                        <?= $row["colors_name"] ?>
                                    </label>
                                </div>
                            <?php  } ?>
                        </div>

                    <?php
                    }

                    $getSpiner = Database::search("SELECT * FROM `product_size`;");

                    if ($getSpiner->num_rows !== 0) {

                    ?>

                        <div class="w-100 mb-4">
                            <h5>Filter by Size:</h5>

                            <?php
                            for ($i = 0; $i < $getSpiner->num_rows; $i++) {

                                $row = $getSpiner->fetch_assoc();

                            ?>

                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="size" id="<?= "size_" . $row['size_name']; ?>">
                                    <label class="form-check-label" for="<?= "size_" . $row['size_name']; ?>">
                                        <?= $row['size_name']; ?>
                                    </label>
                                </div>

                        </div>

                <?php    }
                        } ?>

                </div>
            </div>
            <!-- Content -->
            <div class="col-md-9">

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