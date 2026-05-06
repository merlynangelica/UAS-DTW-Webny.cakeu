<?php
session_start();
include '../config/database.php';
include '../includes/navbar.php';

// 🔐 PROTECT ADMIN
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];

$p = mysqli_fetch_assoc(mysqli_query($conn,"
SELECT * FROM products WHERE id=$id
"));

if(isset($_POST['add_stock'])){

    $stock = $_POST['stock'];

    mysqli_query($conn,"
    UPDATE products 
    SET stock = stock + $stock
    WHERE id=$id
    ");

    header("Location: ../index.php");
}
?>

<div class="checkout-box">

<h2 class="section-title">Add Stock</h2>

<h3><?= $p['name']; ?></h3>

<p>Current Stock: <?= $p['stock']; ?></p>

<form method="POST">

<input 
type="number" 
name="stock" 
placeholder="Tambah Stock"
required
>

<button class="btn" name="add_stock">
Add Stock
</button>

</form>

</div>