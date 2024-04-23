<?php

include "connecton.php";
include 'navbar.php';
include "spinners.php";

?>

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
                            <input class="form-check-input" type="radio" name="categories" id="category_0">
                            <label class="form-check-label" for="category_all">All</label>
                        </div>
                        <?php
                        for ($i = 0; $i < $getCategories->num_rows; $i++) {
                            $row = $getCategories->fetch_assoc();
                        ?>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="categories" id="<?= "category_" . $row['main_category_id']; ?>">
                                <label class="form-check-label" for="<?= "category_" . $row['main_category_id']; ?>"><?= $row['main_category_name']; ?></label>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>

                <!-- Stay by -->
                <div class="w-100 mb-4">
                    <h5>Stay by:</h5>
                    <select class="form-select w-75" aria-label="Default select example" id="stay_by">
                        <option selected value="0">Select</option>
                        <option value="1">Price Accending</option>
                        <option value="2">Price Descending</option>
                    </select>
                </div>

                <!-- Filter by Price -->
                <div class="w-100 mb-4">
                    <h5>Filter by Price:</h5>
                    <div class="d-flex gap-2">
                        <input class="form-control" type="text" id="minPrice" placeholder="min" />
                        <input class="form-control" type="text" id="maxPrice" placeholder="max" />
                    </div>
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
                                <input class="form-check-input" type="radio" style="background-color: <?= $row['color_code'] ?>;" name="color" id="<?= "color_" . $row["colors_id"] ?>">
                                <label class="form-check-label mx-3" for="<?= "color_" . $row["colors_id"] ?>"><?= $row["colors_name"] ?></label>
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
                                <input class="form-check-input" type="radio" name="size" id="<?= "size_" . $row['size_id']; ?>">
                                <label class="form-check-label" for="<?= "size_" . $row['size_id']; ?>"><?= $row['size_name']; ?></label>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="w-100">
                    <button class="btn btn-secondary mt-2">Clear</button>
                    <button class="btn btn-dark mt-2" onclick="advancedSearchProduct();">Apply</button>
                </div>

            </div>

            <!-- Product List -->
            <div class="col-md-9" id="list-view">

                <div class="w-100 d-flex gap-2 justify-content-end align-items-end">
                    <input class="form-control w-50" type="text" id="s_text">
                    <button class="btn btn-dark" onclick="searchProduct()">Search</button>
                </div>

                <?php
                $limit = 10; // Number of items per page
                $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
                $offset = ($page - 1) * $limit; // Offset for database query

                $totalProducts = Database::search("SELECT COUNT(*) as count FROM `product` WHERE `product`.`stetus_stetus_id` != '6';")->fetch_assoc()['count'];
                $totalPages = ceil($totalProducts / $limit);

                $getProduct = Database::search("SELECT * FROM `product` WHERE `product`.`stetus_stetus_id` != '6' LIMIT $limit OFFSET $offset;");
                ?>

                <div class="row">
                    <?php include "product-card.php"; ?>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mt-4">
                        <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <?php for ($i = 1; $i <= $totalPages; $i++) :

                        ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link bg-black" href="?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php endfor; ?>
                        <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>

</body>

</html>