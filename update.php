<!DOCTYPE html>
<!-- HTML5 Document Type Definition -->

<html lang="en">
<head>
 <!-- Setting the encoding for the Arabic language -->
    <meta charset="UTF-8">
    <!-- Set the page display to be responsive to all devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Preload Google Fonts to speed up loading -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Import Cairo and Marhey fonts from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:slnt,wght@-1,200..1000&family=Marhey:wght@300..700&display=swap" rel="stylesheet">
    
   <!-- Link external CSS file -->
    <link rel="stylesheet" href="index.css">

   <!-- The page address shown in the browser -->
    <title>update</title>
</head>
<body>

<?php
   // Include database connection file
    include('config.php');

    // Get the product ID from the link (GET parameter)
    $ID = $_GET['id'];

    // Execute a query to extract product data based on the ID
    $up = mysqli_query($con, "SELECT * FROM prod WHERE id = $ID");

    // Store product data in an array
    $date = mysqli_fetch_array($up);
?>

<center>
    <div class="main">
        <!-- Form to edit product data, sends data to up.php using POST method -->
        <form action="up.php" method="post" enctype="multipart/form-data">
            <h2>تعديل المنتج</h2>

            <!-- Avatar representing product modification -->
            <img src="https://turkeytoarab.com/wp-content/uploads/2020/07/..." alt="" width="450px">

            <!-- Field to show the product ID number (sent hidden or visible depending on usage) -->
            <input type="text" name="id" value="<?php echo $date['id']; ?>">
            <br>

           <!-- Product Name Field -->
            <input type="text" name="name" value="<?php echo $date['name']; ?>">
            <br>

           <!-- Product Price Field -->
            <input type="text" name="price" value="<?php echo $date['price']; ?>">
            <br>

         <!-- New product image upload field (hidden and called by clicking on the label) -->
            <input type="file" id="file" name='image' style='display:none;'>
            <label for="file">تحديث صوره المنتج</label>

           <!-- Submit form button to update the product -->
            <button name='upload' type='submit'>تعديل المنتج</button>
            <br><br>

           <!-- Link to return to the view all products page -->
            <a href="productes.php">عرض كل المنتجات</a>
        </form>
    </div>

  <!-- Simple signature on behalf of the developer -->
    <p>Developer By RAMADAN</p>
</center>

</body>
</html>
