<?php
session_start();
include '../config/database.php';
include '../includes/navbar.php';

// hanya ambil completed
$q = mysqli_query($conn,"SELECT * FROM orders WHERE shipping_status='Completed' ORDER BY id DESC");
?>

<h2 class="section-title">Order History</h2>

<div class="history-container">

<?php while($o=mysqli_fetch_assoc($q)){ ?>

<div class="order-card">

<h3>Order <?= $o['id']; ?></h3>

<p><b>Total:</b> Rp <?= number_format($o['total'],0,',','.'); ?></p>
<p><b>Payment:</b> <?= $o['payment_method']; ?></p>
<p><b>Alamat:</b> <?= $o['address']; ?></p>
<?php if(!empty($o['message'])): ?>
    <p><b>Pesan:</b> <?= $o['message']; ?></p>
<?php endif; ?>

<p style="color:green; font-weight:bold;">
Completed
</p>

</div>

<?php } ?>

</div>