<?php
include('config.php');

$ID = intval($_GET['id']);

// Use a prepared statement
$stmt = mysqli_prepare($con, "DELETE FROM prod WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $ID);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header('Location: productes.php');
exit;
?>
