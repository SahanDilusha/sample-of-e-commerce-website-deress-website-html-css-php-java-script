<?php

include "connecton.php";

$getItems = Database::search("SELECT * FROM `invoice_items` INNER JOIN `product` ON `invoice_items`.`product_id` = `product`.`id`");

if ($getItems->num_rows != 0) {

?>

    <div class="ibox-content">
        <div class="table-responsive">
            <table class="table shoping-cart-table">
                <tbody>

                    <?php

                    for ($i = 0; $i < $getItems->num_rows; $i++) {

                        $row = $getItems->fetch_assoc();

                    ?>

                        <tr>
                            <td width="90">
                                <img src="product_image/img<?php echo ($row["id"]); ?>-1.png" alt="" width="90px">
                            </td>
                            <td class="desc">
                                <h4>
                                    <a href="product-ditels.php?id=<?php echo ($row["id"]); ?>" class="text-dark fw-bold text-decoration-none fs-6">
                                        <?php echo ($row["product_name"]); ?>
                                    </a>
                                </h4>
                                <p class="small">
                                    <?php echo ($row["product_description"]); ?>
                                </p>
                                <dl class="small m-b-none">
                                    <dt>Size : XL</dt>
                                </dl>
                                <div class="m-t-sm">
                                    <i class="text-muted" onclick="addToWishi(<?php echo ($row['id']); ?>);"><i class="bi bi-heart text-danger"></i> Add to wish</i>
                                    |
                                    <i class="text-muted"><i class="bi bi-trash3 text-danger" onclick="DeleteCartItem(<?php echo ($row['id']); ?>);"></i> Remove item</i>
                                    |
                                    <a href="product-ditels.php?id=<?php echo ($row["id"]); ?>" class="text-muted text-decoration-none"><i class="bi bi-pencil-square text-danger" onclick="DeleteCartItem(<?php echo ($row['id']); ?>);"></i> Update</a>
                                </div>
                            </td>
                            <td>
                                <?php

                                if ($row["product_discount"] != 0) {
                                ?>
                                    Rs.<?= $row["product_price"] - ($row["product_price"] * ($row["product_discount"] / 100)) ?>
                                    <s class="small text-muted">Rs. <?= $row['product_price'] ?></s>
                                <?php
                                } else {
                                    echo ("Rs. " . $row["product_price"]);
                                }

                                ?>

                            </td>
                            <td width="100px">
                                <input type="number" class="form-control" min="1" max="10" value="<?= $row['qty'] ?>" disabled />
                            </td>
                            <td>
                                <h4>
                                    <?= ($row["product_price"] - ($row["product_price"] * ($row["product_discount"] / 100))) * $row['qty'] ?>
                                </h4>
                            </td>
                        </tr>

                    <?php    } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php } ?>