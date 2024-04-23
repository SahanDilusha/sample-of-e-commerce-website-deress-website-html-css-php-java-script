<?php
include "connecton.php";
include 'navbar.php';
include "spinners.php";

// Get form data
$searchText = isset($_GET['searchText']) ? $_GET['searchText'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : 'All';
$stayBy = isset($_GET['stayBy']) ? $_GET['stayBy'] : 'All';
$minPrice = isset($_GET['minPrice']) ? $_GET['minPrice'] : '';
$maxPrice = isset($_GET['maxPrice']) ? $_GET['maxPrice'] : '';

// Build the SQL query based on the form data
$query = "SELECT * FROM `product` WHERE `product`.`stetus_stetus_id` != '6'";

if ($searchText != '') {
    $query .= " AND `product_name` LIKE '%$searchText%'";
}

if ($category != 'All') {
    $query .= " AND `category` = '$category'";
}

if ($stayBy != 'All') {
    $query .= " AND `stay_by` = '$stayBy'";
}

if ($minPrice != '' && $maxPrice != '') {
    $query .= " AND `price` BETWEEN $minPrice AND $maxPrice";
}

$getProduct = Database::search($query);

// Pagination
$limit = 10; // Number of items per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
$offset = ($page - 1) * $limit; // Offset for database query

$totalProducts = $getProduct->num_rows;
$totalPages = ceil($totalProducts / $limit);

$query .= " LIMIT $limit OFFSET $offset;";
$getProduct = Database::search($query);

echo '
<div class="w-100 d-flex gap-2 justify-content-end align-items-end">
<input class="form-control w-50" type="text" id="s_text">
<button class="btn btn-dark" onclick="searchProduct()">Search</button>
</div>';

echo '<div class="row">';
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
?>