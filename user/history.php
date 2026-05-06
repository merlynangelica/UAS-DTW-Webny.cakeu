<?php
session_start();
include '../config/database.php';
include '../includes/navbar.php';

$q = mysqli_query($conn,"SELECT * FROM orders WHERE user_id=".$_SESSION['user']['id']." ORDER BY id DESC");
?>

<h2 class="section-title">Status Pesanan</h2>

<div class="history-container">

<?php while($o=mysqli_fetch_assoc($q)){ ?>

<div class="order-card">

<h3>Your Order</h3>

<!-- PRODUK -->
<?php
$items = mysqli_query($conn,"
SELECT p.name, oi.qty 
FROM order_items oi
JOIN products p ON oi.product_id = p.id
WHERE oi.order_id = ".$o['id']);

while($i=mysqli_fetch_assoc($items)){
    echo "<p>".$i['name']." x ".$i['qty']."</p>";
}
?>

<p><b>Total:</b> Rp <?= number_format($o['total'],0,',','.'); ?></p>

<p><b>Payment:</b> <?= $o['payment_method']; ?></p>

<p><b>Alamat:</b> <?= $o['address']; ?></p>

<?php if(!empty($o['message'])): ?>
    <p><b>Pesan:</b> <?= $o['message']; ?></p>
<?php endif; ?>

<?php
$status = $o['shipping_status'];

if($status == "Pending"){
    $color = "orange";
} 
elseif($status == "Confirmed"){
    $color = "blue";
} 
elseif($status == "Completed"){
    $color = "green";
}
elseif($status == "Delivered"){
    $color = "purple";
}
else {
    $color = "black";
}
?>

<p class="status">
Status: <span style="color:<?= $color ?>; font-weight:bold;">
<?= $status; ?>
</span>
</p>

</div>

<?php } ?>

</div>