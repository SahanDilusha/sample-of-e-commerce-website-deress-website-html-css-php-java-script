<?php
// Set content type for JSON response
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialize response array
    $response = ['status' => 'error', 'message' => 'Unknown error occurred.'];

    try {
        // Validate and sanitize inputs
        $productId = htmlspecialchars(trim($_POST['id']));
        $imageId = htmlspecialchars(trim($_POST['imgid']));

        // Check if the file was uploaded successfully
        if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
            // Define allowed file types
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            // Get file type
            $fileType = mime_content_type($_FILES['file']['tmp_name']);

            // Validate file type
            if (!in_array($fileType, $allowedTypes)) {
                $response['message'] = "Invalid file type. Only JPG, PNG, and GIF are allowed.";
            } else {
                // Generate a unique file name using product ID and image ID
                $fileName = "img{$productId}-{$imageId}.png";
                $targetDir = "product_image/"; // Directory where images will be stored
                $targetFile = $targetDir . $fileName;

                // Move uploaded file to the target directory
                if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
                    $response = [
                        'status' => 'ok',
                        'message' => "Image {$imageId} for product {$productId} updated successfully.",
                        'fileName' => $fileName
                    ];
                } else {
                    $response['message'] = "Failed to upload the image.";
                }
            }
        } else {
            $error = $_FILES['file']['error'];
            $response['message'] = "Image is required and must be uploaded. Error code: $error";
        }
    } catch (Exception $e) {
        $response['message'] = 'Exception: ' . $e->getMessage();
    }

    // Return the response as JSON
    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
