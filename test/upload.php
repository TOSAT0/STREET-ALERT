<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //iduser utilizzato come nome del file
    $userId = 123;

    $target_dir = "uploads/";

    // Generate a unique filename using only the user ID
    $target_file = $target_dir . $userId . "_" . basename($_FILES["image"]["name"]); // You can change the file extension if needed
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        echo "File uploaded successfully.";
    } else {
        echo "File is not an image.";
    }
}
?>
