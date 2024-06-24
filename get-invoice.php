<?php
include "connecton.php";

session_start();
$user = $_SESSION["user"];

$q = "SELECT * FROM `invoice` INNER JOIN `stetus` ON `invoice`.`invoice_stetus`=`stetus`.`stetus_id` WHERE `invoice`.`users_username` = '" . $user["username"] . "'";

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $q = $q . "AND `invoice_id` LIKE '" . $_POST["id"] . "%' ";
}

if (isset($_POST["st"]) && !empty($_POST["st"]) && $_POST["st"] !== "0") {
    $q = $q . "AND `invoice_stetus` = '" . $_POST["st"] . "'";
}

$q = $q . "ORDER BY `invoice`.`date` ASC;";

$getInvoice = Database::search($q);

if ($getInvoice->num_rows != 0) {

    for ($i = 0; $i < $getInvoice->num_rows; $i++) {

        $row = $getInvoice->fetch_assoc();

        $getItemCount = Database::search("SELECT COUNT(`invoice_items`.`invoice_items_id`) AS `count` FROM  `invoice_items` WHERE  `invoice_items`.`invoice_invoice_id` ='" . $row["invoice_id"] . "';");

?>
        <div class="col-12 mt-3 d-flex justify-content-between align-items-center">

            <div class="d-flex gap-1 mt-2 justify-content-center align-items-center gap-2">
                <div class="d-flex flex-column">
                    <label class="fs-6 fw-bold"><?= $row["invoice_id"]; ?></label>
                    <small>All Items: <?php

                                        if ($getItemCount->num_rows != 1) {
                                            echo ("0");
                                        } else {
                                            echo ($getItemCount->fetch_assoc()["count"]);
                                        }

                                        ?></small>
                    <small class="fw-bold">LKR <?= $row["grand_total"]; ?></small>
                </div>
            </div>

            <div class="d-flex  justify-content-between  flex-column gap-3">
                <button class="btn btn-outline-dark bi bi-eye" onclick="ViewOrder('<?= $row['invoice_id']; ?>');"> View Order</button>

                <?php
                if ($row["invoice_stetus"] == "11") {
                ?>
                    <button class="btn btn-outline-danger bi bi-x-lg" onclick="CancelOrderModle('<?= $row['invoice_id']; ?>')"> Cancel</button>
                <?php
                }
                ?>
                <?php
                if ($row["invoice_stetus"] == "14") {

                ?>
                    <small class="bg-success text-center text-white rounded-3"><?= $row["stetus_name"] ?></small>
                <?php
                } else {
                ?>
                    <small class="bg-secondary text-center text-white rounded-3"><?= $row["stetus_name"] ?></small>
                <?php
                }
                ?>
            </div>
        </div>

<?php }
}
?>