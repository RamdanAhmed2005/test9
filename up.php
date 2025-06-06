<?php
// Include the database connection file
include('config.php');

// Check if the form has been submitted (i.e., "upload" button is clicked)
if (isset($_POST['upload'])) {
    // Get form input values
    $ID = $_POST['id'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];

    // Check if an image was uploaded
    if (!empty($_FILES['image']['name'])) {
        $IMAGE = $_FILES['image'];
        $image_location = $_FILES['image']['tmp_name']; // Temporary location of uploaded file
        $image_name = $_FILES['image']['name'];         // Original file name
        $image_up = "images/" . $image_name;            // Target location to save the image

        // Move the uploaded file to the target directory
        move_uploaded_file($image_location, $image_up);

        // Update the product with name, price, and image
        $update = "UPDATE prod SET name='$NAME', price='$PRICE', image='$image_up' WHERE id=$ID;";
    } else {
        // If no image is uploaded, update only name and price
        $update = "UPDATE prod SET name='$NAME', price='$PRICE' WHERE id=$ID;";
    }

    // Execute the update query
    mysqli_query($con, $update);

    // Show success message
    echo "<script>alert('Product updated successfully')</script>";

    // Redirect to the products page
    header('Location: productes.php');
    exit();
}
?>
