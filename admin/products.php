<?php
include '../config/database.php';
include '../includes/navbar.php';

$q = mysqli_query($conn,"SELECT * FROM products");
?>

<h2 class="section-title">Manage Products</h2>

<a href="add_product.php" class="btn">+ Add Product</a>

<div class="products">

<?php while($p=mysqli_fetch_assoc($q)){ ?>

<div class="card">
<img src="../uploads/<?= $p['image']; ?>">

<div class="card-body">
<h3><?= $p['name']; ?></h3>
<p><?= $p['description']; ?></p>

<div class="price">
Rp <?= number_format($p['price'],0,',','.'); ?>
</div>

<div style="margin-top:10px;">
    <a href="edit_product.php?id=<?= $p['id']; ?>" class="btn">Edit</a>
    <a href="delete_product.php?id=<?= $p['id']; ?>" class="btn">Delete</a>
</div>

</div>
</div>

<?php } ?>

</div>