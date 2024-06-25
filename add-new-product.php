<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialize error array
    $errors = [];

    // Sanitize and validate product name
    $productName = strtoupper(trim($_POST['name'])); // Convert to uppercase and trim spaces
    if (empty($productName)) {
        $errors[] = "Product name is required.";
    }

    // Validate product price
    $productPrice = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    if ($productPrice === false || $productPrice <= 0) {
        $errors[] = "Valid product price is required.";
    }

    $delivery = filter_input(INPUT_POST, 'delivery', FILTER_VALIDATE_FLOAT);
    if ($delivery === false || $delivery <= 0) {
        $errors[] = "Valid product delivery price is required.";
    }

    // Validate product discount
    $productDiscount = filter_input(INPUT_POST, 'discount', FILTER_VALIDATE_FLOAT);
    if ($productDiscount === false || $productDiscount < 0 || $productDiscount > 100) {
        $errors[] = "Valid discount percentage is required (0-100).";
    }
    $productQty = filter_input(INPUT_POST, 'qty', FILTER_VALIDATE_FLOAT);
    if ($productQty === false || $productQty <= 0) {
        $errors[] = "Valid product QTY is required.";
    }

    $productDescription =  htmlspecialchars(trim($_POST['description']));
    if ($productDescription === false || $productDescription <= 0) {
        $errors[] = "Valid product description is required.";
    }

    // Sanitize main category
    $mainCategory = htmlspecialchars(trim($_POST['mainCategory']));
    if (empty($mainCategory)) {
        $errors[] = "Main category is required.";
    }

    // Sanitize sub category
    $subCategory = htmlspecialchars(trim($_POST['subCategory']));
    if (empty($subCategory)) {
        $errors[] = "Sub category is required.";
    }

    // Sanitize color
    $color = htmlspecialchars(trim($_POST['color']));
    if (empty($color)) {
        $errors[] = "Color is required.";
    }

    $subMaterial = htmlspecialchars(trim($_POST['material']));
    if (empty($subMaterial)) {
        $errors[] = "Material is required.";
    }


    $barnd = htmlspecialchars(trim($_POST['barnd']));
    if (empty($barnd)) {
        $errors[] = "Material is required.";
    }

    function generateUniqueNumber() {
        $uniqueId = uniqid();
        $numericPart = substr(preg_replace("/[^0-9]/", "", $uniqueId), 0, 8);
        $uniqueNumber = str_pad($numericPart, 8, "0", STR_PAD_LEFT);
        return $uniqueNumber;
    }


    // Generate a unique product ID
    $productId = generateUniqueNumber(); // Get the last 10 characters

    // Handle file uploads
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $fileNames = []; // Array to store uploaded file names
    for ($i = 1; $i <= 3; $i++) {
        $fileKey = "image$i";
        if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] == UPLOAD_ERR_OK) {
            $fileType = mime_content_type($_FILES[$fileKey]['tmp_name']);
            if (!in_array($fileType, $allowedTypes)) {
                $errors[] = "Invalid file type for Image $i. Only JPG, PNG, and GIF are allowed.";
            } else {
                $fileName = "img{$productId}-$i.png";
                $targetDir = "product_image/";
                $targetFile = $targetDir . $fileName;
                if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $targetFile)) {
                    $fileNames[] = $fileName;
                } else {
                    $errors[] = "Failed to upload Image $i.";
                }
            }
        } else {
            $errors[] = "Image $i is required.";
        }
    }

    if (empty($errors)) {

        include "connecton.php";

        Database::iud("INSERT INTO `product`(
            `id`,
            `product_name`,
            `product_description`,
            `product_qty`,
            `product_price`,
            `product_discount`,
            `stetus_stetus_id`,
            `star`,
            `brand_idbrand`,
            `material_material_id`,
            `delivery`,
            `sub_category_id`,
            `main_category_id`,
            `product_colors_id`)
            VALUES(
                '" . $productId . "',
                '" . $productName . "',
                '" . $productDescription . "',
                '" . $productQty . "',
                '" . $productPrice . "',
                '" . $productDiscount . "',
                '1',
                '0',
                '" . $barnd . "',
                '" . $subMaterial . "',
                '" . $delivery . "',
                '" . $subCategory . "',
                '" . $mainCategory . "',
                '" . $color . "'
            );
            ");

        echo "ok";
    } else {
        // If there are errors, respond with error messages
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
