<?php
session_start();
include '../config/database.php';

// 🔥 UPDATE QTY (TARO DI SINI)
if(isset($_POST['action'])){
    $id = $_POST['id'];

    if($_POST['action'] == 'plus'){
        $_SESSION['cart'][$id]++;
    }

    if($_POST['action'] == 'minus'){
        $_SESSION['cart'][$id]--;
        if($_SESSION['cart'][$id] <= 0){
            unset($_SESSION['cart'][$id]);
        }
    }

    header("Location: cart.php");
    exit;
}

// 🔥 HANDLE CHECKOUT
if(isset($_POST['go_checkout'])){
    $_SESSION['message'] = $_POST['message'];
    header("Location: checkout.php");
    exit;
}

// BARU INCLUDE NAVBAR
include '../includes/navbar.php';

$total = 0;
?>

<div class="page-container">

<h2 class="section-title">Cart</h2>

<div class="cart-box">

<?php if(!empty($_SESSION['cart'])): ?>

    <?php
    foreach($_SESSION['cart'] as $id => $qty){
        $p = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products WHERE id=$id"));

        if($p){
            $sub = $p['price'] * $qty;
            $total += $sub;
    ?>
    <div class="cart-row">

    <div class="cart-name">
        <?= $p['name']; ?>
    </div>

    <div class="cart-right">

        <span class="cart-price">
            Rp <?= number_format($sub,0,',','.'); ?>
        </span>

        <div class="qty-control">
            <form method="POST">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="action" value="minus">
                <button class="qty-btn">-</button>
            </form>

            <span class="qty"><?= $qty ?></span>

            <form method="POST">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="action" value="plus">
                <button class="qty-btn">+</button>
            </form>
        </div>

    </div>

</div>
    <?php 
        }
    } 
    ?>

    <h3>Total: Rp <?= number_format($total,0,',','.'); ?></h3>

    <!-- FORM CHECKOUT -->
    <form method="POST">
        <textarea name="message" placeholder="Pesan (opsional)"></textarea>
        <button class="btn" name="go_checkout">Checkout</button>
    </form>

<?php else: ?>

    <p>Cart kosong</p>

<?php endif; ?>

</div>
</div>