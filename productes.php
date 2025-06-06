<?php
// Start the session to track the user after login
session_start();

// Check if the user is not logged in
// If they are not logged in, they are redirected to the login page
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Include database connection settings file
include('config.php');
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>المنتجات</title>

<!-- Include Bootstrap library from CDN for page layout and design -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Embed fonts from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:slnt,wght@-1,200..1000&family=Marhey:wght@300..700&display=swap" rel="stylesheet">

    <!-- Custom CSS styles for the page -->
    <style>
        body {
            font-family: 'Cairo', sans-serif;/* Set a general font for the page */
        }
        h3 {
            font-weight: bold; /* Make titles prominent */
        }
        .card {
            float: right; /* Right align cards */
            margin-top: 20px;
            margin-left: 10px;
            margin-right: 10px;
        }
        .card img {
            width: 100%; /* Make the product image take up the full width of the card */
            height: 180px; /* Set image height */
        }
        main {
            width: 60%; /* Specify the width of the product display area */
        }
    </style>
</head>
<body>

    <!-- Welcome message with username -->
    <center>
        <h3 style="margin-top: 20px; color: #333;">
            مرحبًا، <?php echo htmlspecialchars($_SESSION['user']); ?>
        </h3>
        <h3>جميع المنتجات المتوفرة</h3>
    </center>

    <?php
 // Execute a query to fetch all products from the database
    $result = mysqli_query($con, "SELECT * FROM prod");

    // Iterate through each product and display it in a card
    while ($row = mysqli_fetch_array($result)) {
        echo '
        <center>
            <main>
                <div class="card" style="width: 18rem;">
                <!-- View product image -->
                    <img src="' . $row['image'] . '" class="card-img-top">

                    <!-- View product details -->
                    <div class="card-body">
                        <h5 class="card-title">' . $row['name'] . '</h5>
                        <p class="card-text">' . $row['price'] . '</p>

                        <!-- Product control buttons (delete and edit) -->
                        <a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger">حذف منتج</a>
                        <a href="update.php?id=' . $row['id'] . '" class="btn btn-primary">تعديل منتج</a>
                    </div>
                </div>
            </main>
        </center>
        ';
    }
    ?>
</body>
