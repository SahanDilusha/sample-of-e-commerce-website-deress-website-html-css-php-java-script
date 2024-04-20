<?php

include "connecton.php";

if (isset($_GET["text"])) {

    if (!empty(trim($_GET['text']))) {
        $getProduct = Database::search("SELECT * FROM `product` WHERE `product`.`stetus_stetus_id` != '6' AND `product_name` LIKE '%" . $_GET['text'] . "%';");

        echo (?> 
        
        <div class="col-md-9">
                <div class="w-100 d-flex justify-content-between align-items-center">
                    <label for="">All</label>
                    <div class="d-flex gap-2">
                        <input class="form-control" type="text" />
                        <button class="btn btn-dark">Search</button>
                    </div>
                </div>
                <?php
                // Pagination variables
                $limit = 10; // Number of items per page
                $page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
                $offset = ($page - 1) * $limit; // Offset for database query

                // Get total number of products
                $totalProducts = Database::search("SELECT COUNT(*) as count FROM `product` WHERE `product`.`stetus_stetus_id` != '6';")->fetch_assoc()['count'];

                // Calculate total pages
                $totalPages = ceil($totalProducts / $limit);

                // Get products for current page
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
                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                            <li class="page-item <?= $i == $page ? 'active' : '' ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php endfor; ?>
                        <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                            <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        
        <?php );
    }
}
?>