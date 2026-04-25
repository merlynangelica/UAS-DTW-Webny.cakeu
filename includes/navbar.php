<?php 
if(session_status() === PHP_SESSION_NONE){
    session_start();
}
$current = basename($_SERVER['PHP_SELF']);
$base = "/UAS-DTW-Webny.cakeu/";
?>

<link rel="stylesheet" href="<?= $base ?>style.css">

<div class="navbar">
    <div class="logo">Ny.Cakeu</div>

    <div>
    <a href="<?= $base ?>index.php" 
    class="nav-home <?= $current=='index.php'?'active':'' ?>">
    Home</a>

    <?php if(isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'): ?>

        <!-- 👑 ADMIN MENU -->
        <a href="<?= $base ?>admin/orders.php" class="<?= $current=='orders.php'?'active':'' ?>">Orders</a>
        <a href="<?= $base ?>admin/history.php" class="<?= $current=='history.php'?'active':'' ?>">History</a>
        <a href="<?= $base ?>admin/products.php" class="<?= $current=='products.php'?'active':'' ?>">Products</a>

    <?php else: ?>

        <!-- 👤 USER MENU -->
        <a href="<?= $base ?>index.php#drinks" class="nav-drinks">Drinks</a>
        <a href="<?= $base ?>index.php#dessert" class="nav-dessert">Dessert</a>

        <a href="<?= $base ?>user/cart.php" class="<?= $current=='cart.php'?'active':'' ?>">Cart</a>
        <a href="<?= $base ?>user/history.php" class="<?= $current=='history.php'?'active':'' ?>">History</a>
        <a href="<?= $base ?>user/profile.php" class="<?= $current=='profile.php'?'active':'' ?>">Profile</a>

    <?php endif; ?>

    <?php if(isset($_SESSION['user'])): ?>
        <a href="<?= $base ?>auth/logout.php">Logout</a>
    <?php else: ?>
        <a href="<?= $base ?>auth/login.php">Login</a>
    <?php endif; ?>
    </div>
</div>