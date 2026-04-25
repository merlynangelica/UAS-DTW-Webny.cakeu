<?php
include '../config/database.php';

$id = $_POST['id'];
$status = $_POST['status'];

mysqli_query($conn,"UPDATE orders SET shipping_status='$status' WHERE id=$id");

header("Location: orders.php");
exit;