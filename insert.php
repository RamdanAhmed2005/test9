<?php
// Include the database configuration file
include('config.php');

// Check if the form was submitted with the "upload" button
if (isset($_POST['upload'])) {
    // Get product name from the form
    $NAME = $_POST['name'];

    // Get product price from the form
    $PRICE = $_POST['price'];

    // Get the uploaded image file
    $IMAGE = $_FILES['image'];

    // Temporary location of the uploaded image
    $image_location = $_FILES['image']['tmp_name'];

    // Original name of the uploaded image
    $image_name = $_FILES['image']['name'];

    // Final path where the image will be saved
    $image_up = "images/" . $image_name;

    // Insert the product data into the "prod" table
    $insert = "INSERT INTO prod (name, price, image) VALUES ('$NAME', '$PRICE', '$image_up')";
    mysqli_query($con, $insert);

    // Move the uploaded image to the "images" directory
    if (move_uploaded_file($image_location, 'images/' . $image_name)) {
        // Display success message if image was moved successfully
        echo "<script>alert('Product uploaded successfully')</script>";
    } else {
        // Display error message if there was a problem uploading the image
        echo "<script>alert('An error occurred and the product was not uploaded')</script>";
    }

    // Redirect to the main page after the operation
    header('Location: index.php');
}
?>
