<?php
session_start();
include '../config/database.php';
include '../includes/navbar.php';

// 🔥 CEK CART KOSONG
if(empty($_SESSION['cart'])){
    header("Location: cart.php");
    exit;
}

$message = $_SESSION['message'] ?? '';

if(isset($_POST['checkout'])){
    $uid = $_SESSION['user']['id'];
    $address = trim($_POST['address']);
    $payment = $_POST['payment'];

    if(empty($address)){
        echo "<script>alert('Alamat wajib diisi!');</script>";
    } else {

        $total = 0;

        // 🔥 HITUNG TOTAL (AMAN)
        foreach($_SESSION['cart'] as $id => $qty){
            $p = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products WHERE id=$id"));
            if($p){
                $total += $p['price'] * $qty;
            }
        }

        $status = "Pending";

        // 🔥 INSERT ORDER
        mysqli_query($conn,"INSERT INTO orders(user_id,total,address,message,payment_method,shipping_status)
        VALUES('$uid','$total','$address','$message','$payment','$status')");

        $order_id = mysqli_insert_id($conn);

        // 🔥 INSERT ITEMS (VALIDASI)
        foreach($_SESSION['cart'] as $id => $qty){
            if($qty > 0){
                mysqli_query($conn,"INSERT INTO order_items(order_id, product_id, qty)
                VALUES('$order_id','$id','$qty')");
            }
        }

        // 🔥 RESET SESSION (PENTING)
        unset($_SESSION['cart']);
        unset($_SESSION['message']);

        header("Location: ../index.php?success=1");
        exit;
    }
}
?>

<div class="checkout-box">

<h2 class="section-title">Checkout</h2>

<!-- LIST CART -->
<?php
$total = 0;

foreach($_SESSION['cart'] as $id => $qty){
    $p = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM products WHERE id=$id"));
    if($p){
        $sub = $p['price'] * $qty;
        $total += $sub;
?>
    <p><?= $p['name']; ?> x <?= $qty; ?> = Rp <?= number_format($sub,0,',','.'); ?></p>
<?php
    }
}
?>

<h3>Total: Rp <?= number_format($total,0,',','.'); ?></h3>

<form method="POST">
    <textarea name="address" placeholder="Alamat" required></textarea>

    <label class="input-label">Payment :</label>
    
    <select name="payment" id="payment">
        <option value="QRIS">QRIS</option>
        <option value="COD">COD</option>
    </select>

    <!-- QR CODE -->
    <div id="qris-box" style="margin-top:15px; text-align:center;">
        <p>Scan QR untuk pembayaran</p>
        <img src="/UAS-DTW-Webny.cakeu/uploads/qris.png" style="width:200px; border-radius:10px;">
    </div>

    <button class="btn" name="checkout">Bayar</button>
</form>

</div>

<script>
const payment = document.getElementById("payment");
const qrisBox = document.getElementById("qris-box");

// AUTO LOAD
window.addEventListener("load", function(){
    qrisBox.style.display = payment.value === "QRIS" ? "block" : "none";
});

// CHANGE
payment.addEventListener("change", function(){
    qrisBox.style.display = this.value === "QRIS" ? "block" : "none";
});
</script>