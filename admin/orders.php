<?php
session_start();
include '../config/database.php';
include '../includes/navbar.php';

// 🔐 PROTECT ADMIN
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
    header("Location: ../index.php");
    exit;
}

// ambil semua order
$q = mysqli_query($conn,"SELECT * FROM orders ORDER BY id DESC");
?>

<h2 class="section-title">Manage Orders</h2>

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

<?php
$status = $o['shipping_status'];

if($status == "Pending"){
    $color = "orange";
} elseif($status == "Confirmed"){
    $color = "blue";
} elseif($status == "Completed"){
    $color = "green";
} else {
    $color = "black";
}
?>

<p>
<span style="color:#e84393; font-weight:bold;">Status:</span>
<span style="color:<?= $color ?>; font-weight:bold;">
    <?= $status; ?>
</span>
</p>

<!-- 🔥 UPDATE STATUS -->
<form action="update_status.php" method="POST">
    <input type="hidden" name="id" value="<?= $o['id']; ?>">

    <select name="status">
    <option value="Pending" <?= $o['shipping_status']=='Pending'?'selected':'' ?>>Pending</option>
    <option value="Confirmed" <?= $o['shipping_status']=='Confirmed'?'selected':'' ?>>Confirmed</option>
    <option value="Completed" <?= $o['shipping_status']=='Completed'?'selected':'' ?>>Completed</option>
    </select>

    <button class="btn">Update</button>
</form>

</div>

<?php } ?>

</div>