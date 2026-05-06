<?php
session_start();
include '../config/database.php';
include '../includes/navbar.php';

// 🔐 PROTECT ADMIN
if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin'){
    header("Location: ../index.php");
    exit;
}

$q = mysqli_query($conn,"
SELECT orders.*, users.name 
FROM orders
JOIN users ON orders.user_id = users.id
WHERE shipping_status != 'Delivered'
ORDER BY orders.id DESC
");
?>

<h2 class="section-title">Manage Orders</h2>

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

<?php
$status = $o['shipping_status'];

if($status == "Pending"){
    $color = "orange";
} elseif($status == "Confirmed"){
    $color = "blue";
} elseif($status == "Completed"){
    $color = "green";
} elseif($status == "Delivered"){
    $color = "purple";
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
        <option value="Pending" <?= $status=='Pending'?'selected':'' ?>>Pending</option>
        <option value="Confirmed" <?= $status=='Confirmed'?'selected':'' ?>>Confirmed</option>
        <option value="Completed" <?= $status=='Completed'?'selected':'' ?>>Completed</option>
        <option value="Delivered" <?= $status=='Delivered'?'selected':'' ?>>Delivered</option>
    </select>

    <button class="btn">Update</button>
</form>

</div>

<?php } ?>

</div>