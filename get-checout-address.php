<?php
include "connecton.php";
session_start();

$user = $_SESSION["user"];

$getAddress = Database::search("SELECT * FROM `user_address` INNER JOIN `city` ON `user_address`.`city_city_id` = `city`.`city_id` 
WHERE `user_address`.`users_username` = '" . $user["username"] . "' AND  `user_address`.`stetus_stetus_id` != '4';");

if ($getAddress->num_rows !== 0) {

    for ($i = 0; $i < $getAddress->num_rows; $i++) {

        $row = $getAddress->fetch_assoc();
?>
        <div class="col-md-3 px-2 py-1 <?php if (isset($_SESSION["address_id"]) && $_SESSION["address_id"] ==  $row["address_id"]) { ?> 
    bg-danger-subtle 
<?php } else { ?> 
    bg-secondary-subtle 
<?php } ?> " onclick="SelectShoppingAddress(<?= $row['address_id']; ?>);">

            <div class="w-100 m-2 p-1 d-flex justify-content-between align-items-center">
                <label class="fs-5 fw-bold"><?php echo ($row["address_name"]); ?></label>

            </div>
            <div class="w-100 px-1 d-flex gap-2 flex-column">
                <label><?php echo ($row["line_1"] . ", " . $row["line_2"] . ", " . $row["city_name"]); ?></label>
                <label><?php echo ($row["address_mobile"]) ?></label>
            </div>
            <div class="d-flex  mt-2 mb-2 justify-content-between align-items-center">
                <?php

                if ($row["stetus_stetus_id"] !== "2") {
                ?>
                    <button class="btn btn-secondary bi bi-pencil-square" onclick="setDefaultAddress2(<?php echo ($row['address_id']); ?>);"> Set Default</button>
                <?php
                }
                if ($row["stetus_stetus_id"] == "2") {
                ?>
                    <label class="p-1 text-success fw-bold">Default</label>
                <?php
                } ?>
                <button class="btn bg-danger-subtle border-danger bi bi-trash3" onclick="deleteAddress(<?php echo ($row['address_id']); ?>)"> Delete</button>
            </div>
        </div>

<?php }
} ?>