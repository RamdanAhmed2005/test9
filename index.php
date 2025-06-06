<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google Fonts: Cairo & Marhey -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:slnt,wght@-1,200..1000&family=Marhey:wght@300..700&display=swap" rel="stylesheet">
    
    <!-- External CSS file -->
    <link rel="stylesheet" href="index.css">

    <title>Shop online</title>
</head>
<body>

<?php 
// Start the session
session_start();

// Redirect to products page if the user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: productes.php');
    exit;
}
?>

<!-- Product upload form -->
<center>
    <div class="main">
        <form action="insert.php" method="post" enctype="multipart/form-data">
            <h2>موقع تسويق</h2>

            <!-- Logo or illustrative image -->
            <img src="https://turkeytoarab.com/wp-content/uploads/2020/07/شركة-ويب-السعودية-لخدمات-تصميم-المواقع-والتسويق-الالكتروني-2.png" 
                 alt="Marketing Logo" width="450px">

            <!-- Product name input -->
            <input type="text" name="name" placeholder="اسم المنتج" required>
            <br>

            <!-- Product price input -->
            <input type="text" name="price" placeholder="سعر المنتج" required>
            <br>

            <!-- Product image input -->
            <input type="file" id="file" name="image" style="display:none;" required>
            <label for="file" style="cursor: pointer;">اختيار صورة للمنتج</label>

            <!-- Submit button -->
            <button name="upload">🆗 رفع المنتج</button>
            <br><br>

            <!-- Link to view all products -->
            <a href="productes.php">عرض كل المنتجات</a>
        </form>

        <!-- Logout button -->
        <center>
            <a href="logout.php" style="color: red; text-decoration: none; font-size: 16px;">تسجيل الخروج</a>
        </center>
    </div>

    <!-- Footer -->
    <p>Developer By RAMADAN</p>
</center>

</body>
</html>
