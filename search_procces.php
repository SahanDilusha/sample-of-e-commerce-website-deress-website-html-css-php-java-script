<?php

include "connecton.php";

if (isset($_GET["text"])) {

    if (!empty(trim($_GET['text']))) {
       
        echo '
                <div class="w-100 d-flex justify-content-between align-items-center">
                    <label for="">All</label>
                    <div class="d-flex gap-2">
                        <input class="form-control" type="text" value="'.$_GET["text"].'" id="s_text"/>
                        <button class="btn btn-dark" onclick="searchProduct();">Search</button>
                    </div>
                </div>';

        // Pagination variables
        $limit = 10; // Number of items per page
        $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
        $offset = ($page - 1) * $limit; // Offset for database query

        // Get total number of products
        $totalProducts = Database::search("SELECT COUNT(*) as count FROM `product` WHERE `product`.`stetus_stetus_id` != '6';")->fetch_assoc()['count'];

        // Calculate total pages
        $totalPages = ceil($totalProducts / $limit);

        // Get products for current page

        $getProduct = Database::search("SELECT * FROM `product` WHERE  `product`.`stetus_stetus_id` != '6' AND `product_name` LIKE '%".$_GET["text"]."%'  LIMIT $limit OFFSET $offset;");

        echo '<div class="row">';
        include "product-card.php";
        echo '</div>';

        // Pagination
        echo '<nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center mt-4">
                    <li class="page-item ' . ($page <= 1 ? "disabled" : "") . '">
                        <a class="page-link" href="?page=' . ($page - 1) . '" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>';
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<li class="page-item ' . ($i == $page ? "active" : "") . ' bg-black"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
        }
        echo '<li class="page-item ' . ($page >= $totalPages ? "disabled" : "") . '">
                <a class="page-link" href="?page=' . ($page + 1) . '">Next</a>
              </li>
              </ul>
              </nav>';
    } else {
        echo '<div class="w-100 d-flex justify-content-between align-items-center">
                <label for="">All</label>
                <div class="d-flex gap-2">
                    <input class="form-control" type="text" id="s_text"/>
                    <button class="btn btn-dark" onclick="searchProduct();">Search</button>
                </div>
              </div>
              <div class="col-12 d-flex flex-column justify-content-center align-items-center mt-5">
                <i class="bi bi-emoji-frown-fill text-danger fs-4"></i>
                <h3>No items yet.</h3>
                <a class="btn btn-dark" href="http://localhost/MyShop/search-product.php">Back</a>
              </div>';
    }
} else {
    echo '<div class="w-100 d-flex justify-content-between align-items-center">
            <label for="">All</label>
            <div class="d-flex gap-2">
                <input class="form-control" type="text" id="s_text" />
                <button class="btn btn-dark" onclick="searchProduct();">Search</button>
            </div>
          </div>
          <div class="col-12 d-flex flex-column justify-content-center align-items-center mt-5">
            <i class="bi bi-emoji-frown-fill text-danger fs-4"></i>
            <h3>No items yet.</h3>
            <a class="btn btn-dark" href="http://localhost/MyShop/search-product.php">Back</a>
          </div>';
}

?>
