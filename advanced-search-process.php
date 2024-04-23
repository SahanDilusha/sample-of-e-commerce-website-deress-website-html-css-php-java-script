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
        <input class="form-control w-50" type="text" id="s_text">
        <button class="btn btn-dark" onclick="searchProduct()">Search</button>
    </div>

    <div class="row">';
include "product-card.php";
echo '</div>

  <nav aria-label="Page navigation example">
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
