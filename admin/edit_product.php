<?php
include '../config/database.php';
include '../includes/navbar.php';

$id = $_GET['id'];
$p = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products WHERE id=$id"));

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];
    $stock = $_POST['stock'];

    mysqli_query($conn,"UPDATE products SET 
    name='$name',
    price='$price',
    description='$desc',
    stock='$stock'
    WHERE id=$id");

    header("Location: products.php");
}
?>

<h2>Edit Product</h2>

<form method="POST">
<input name="name" value="<?= $p['name']; ?>">
<input name="price" value="<?= $p['price']; ?>">
<input name="description" value="<?= $p['description']; ?>">
<input type="number" name="stock" value="<?= $p['stock']; ?>">

<button class="btn" name="update">Update</button>
</form>