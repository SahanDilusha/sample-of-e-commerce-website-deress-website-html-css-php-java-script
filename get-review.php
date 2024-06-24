<?php
include "connecton.php";

$getId = $_GET["id"];

$getResiew = Database::search("SELECT * FROM `reviews`  WHERE `reviews`.`product_id` = '" . $getId . "';");

if ($getResiew->num_rows != 0) {

    for ($i = 0; $i < $getResiew->num_rows; $i++) {
        $row = $getResiew->fetch_assoc();
?>
        <div class="d-flex flex-column mt-2">
            <div class="d-flex gap-3">
                <img src="profile_images/<?= $row["users_username"]; ?>.png" class="rounded-5" width="50px" />
                <div class="">
                    <small><?= $row["users_username"]; ?></small>
                    <div class="rating d-flex gap-2">

                        <?php

                        if ($row["re"] == 5) {
                        ?>
                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star-fill text-dark"></li>
                        <?php
                        } else if ($row["re"] == 4) {
                        ?>
                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                        <?php } else if ($row["re"] == 3) { ?>

                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                        <?php
                        } else if ($row["re"] == 2) { ?>

                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                        <?php
                        } else if ($row["re"] == 1) { ?>
                            <li class="star-item bi bi-star-fill text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                        <?php
                        } else { ?>
                            <li class="star-item bi bi-star text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                            <li class="star-item bi bi-star text-dark"></li>
                        <?php }  ?>

                    </div>

                </div>
            </div>
            <small class="mt-2 mb-2 px-2 fw-bold"><?= $row["reviews_text"] ?></small>
            <?php

            $getAdminRe = Database::search("SELECT `review_admin_text`,`review_admin_date` FROM `review_admin` WHERE `review_admin`.`reviews_reviews_id` = '" . $row["reviews_id"] . "'");

            if ($getAdminRe->num_rows !== 0) {
                # code...

                $row = $getAdminRe->fetch_assoc();

            ?>

                <small class="text-secondary mt-2 mb-2 px-2"><?=$row["review_admin_text"];?></small>

                <small class="px-2">Review by <small class="fw-bold">Krist</small>Posted on <small class="fw-bold"><?=date("Y M d", strtotime($row["review_admin_date"]))?></small></small>



            <?php } ?>
        </div>

<?php
    }
} ?>