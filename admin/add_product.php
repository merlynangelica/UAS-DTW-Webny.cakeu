<?php
include '../config/database.php';
include '../includes/navbar.php';

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['description'];
    $cat = $_POST['category'];
    $stock = $_POST['stock'];

    $img = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],"../uploads/".$img);

    mysqli_query($conn,"INSERT INTO products(name,price,description,category,image,stock)
    VALUES('$name','$price','$desc','$cat','$img','$stock')");

    header("Location: products.php");
}
?>

<h2 class="section-title">Add Product</h2>

<form method="POST" enctype="multipart/form-data">
<input name="name" placeholder="Nama Produk">
<input name="price" placeholder="Harga">
<input name="description" placeholder="Description">
<input type="number" name="stock" placeholder="Stock" required>

<select name="category">
<option value="drink">Drink</option>
<option value="dessert">Dessert</option>
</select>

<input type="file" name="image">

<button class="btn" name="add">Add</button>
</form>