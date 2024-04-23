<?php

include "connecton.php";

$q = "SELECT * FROM `product` WHERE `product`.`stetus_stetus_id` != '6'";

if (isset($_GET["category"])) {
    if ($_GET["category"] != "") {

        if ($_GET["category"] != "0") {

            $q = $q . "AND `product`.`main_category_id` = '" . $_GET["category"] . "'";
        }
    }
}

$text = "";

if (isset($_GET["text"])) {
    if (!empty($_GET["text"])) {
        $q = $q . "AND `product_name` LIKE '%" . $_GET["text"] . "%' = '" . $_GET["text"] . "'";
        $text = $_GET["text"];
    }
}

if (isset($_GET["brand"])) {
    if (!empty($_GET["brand"])) {
        $q = $q . " AND `product`.`brand_idbrand`= '" . $_GET["brand"] . "' ";
    }
}

if (isset($_GET["color"])) {
    if (!empty($_GET["color"])) {
        $q = $q . "AND `product`.`product_colors_id`= '" . $_GET["color"] . "'";
    }
}

if (isset($_GET['minPrice']) & isset($_GET['maxPrice'])) {

    if (!empty($_GET['minPrice']) & empty($_GET['maxPrice'])) {
        $q .= " AND `product`.`product_price` >= '" . $_GET['minPrice'] . "'";
    } else if (!empty($_GET['maxPrice']) & empty($_GET['minPrice'])) {
        $q .= " AND `product`.`product_price` <= '" . $_GET['maxPrice'] . "'";
    } else if (!empty($_GET['minPrice']) && !empty($_GET['maxPrice'])) {
        $q .= " AND `product`.`product_price` >= '" . $_GET['minPrice'] . "' AND `product`.`product_price` <= '" . $_GET['maxPrice'] . "'";
    }
}

if (isset($_GET['stay'])) {

    if (!empty($_GET['stay'])) {
        
        if ($_GET['stay']=="1") {
            $q = $q."ORDER BY  `product`.`product_price` ASC ";
        }else if($_GET['stay']=="2"){
            $q = $q."ORDER BY  `product`.`product_price` DESC ";
        }

    }
}


// Pagination variables
$limit = 10; // Number of items per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
$offset = ($page - 1) * $limit; // Offset for database query

// Get total number of products
$totalProducts = Database::search("SELECT COUNT(*) as count FROM `product` WHERE `product`.`stetus_stetus_id` != '6';")->fetch_assoc()['count'];

// Calculate total pages
$totalPages = ceil($totalProducts / $limit);

$q = $q . "LIMIT $limit OFFSET $offset;";

$getProduct = Database::search($q);

echo '
        <div class="w-100 d-flex gap-2 justify-content-end align-items-end">
        <input class="form-control w-50" type="text" id="s_text" value="' . $text . '">
        <button class="btn btn-dark" onclick="searchProduct()">Search</button>
    </div>

    <div class="row">';
include "product-card2.php";
echo '</div>';

if ($getProduct->num_rows != 0) {

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
}
