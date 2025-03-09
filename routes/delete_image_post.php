<?php


if (isset($_POST['image_path'])) {
    $imagePath = $_POST['image_path'];
    $message = deleteImage($imagePath); // Call the delete function (no redirection inside it)

    // Check if the image deletion was successful
    if ($message === true) {
        echo "<script> window.location.href='/edit_event';</script>";
        exit(); // Make sure to stop the script after the redirect
    } else {
        // If there was an error, display the message
        echo $message;
    }
}



?>
