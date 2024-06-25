<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialize error array
    $errors = [];

    // Sanitize and validate product name
    $productName = htmlspecialchars(trim($_POST['name']));
    if (empty($productName)) {
        $errors[] = "Product name is required.";
    }

    // Validate product price
    $productPrice = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    if ($productPrice === false || $productPrice <= 0) {
        $errors[] = "Valid product price is required.";
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

    // Generate a unique product ID
    $productId = uniqid(true); // Example: prod_60d5f29a5f96e

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

        echo "ok";
    } else {
        // If there are errors, respond with error messages
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
