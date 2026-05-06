<?php
session_start();
include '../config/database.php';
include '../includes/navbar.php';

$q = mysqli_query($conn,"
SELECT orders.*, users.name 
FROM orders
JOIN users ON orders.user_id = users.id
WHERE shipping_status='Delivered'
ORDER BY orders.id DESC
");
?>

<h2 class="section-title">Order History</h2>

<div class="history-container">

<?php while($o=mysqli_fetch_assoc($q)){ ?>

<div class="order-card">

<h3>Order <?= $o['id']; ?></h3>

<p><b>Customer:</b> <?= $o['name']; ?></p>

<p><b>Total:</b> Rp <?= number_format($o['total'],0,',','.'); ?></p>
<p><b>Payment:</b> <?= $o['payment_method']; ?></p>
<p><b>Alamat:</b> <?= $o['address']; ?></p>
<?php if(!empty($o['message'])): ?>
    <p><b>Pesan:</b> <?= $o['message']; ?></p>
<?php endif; ?>

<p style="color:purple; font-weight:bold;">
Delivered
</p>

</div>

<?php } ?>

</div>