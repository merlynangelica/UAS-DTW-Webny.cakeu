<?php
session_start();
include 'config/database.php';

$added = false;

if(isset($_POST['product_id'])){
    $_SESSION['cart'][$_POST['product_id']] =
    ($_SESSION['cart'][$_POST['product_id']] ?? 0) + 1;

    $added = true;
}

include 'includes/navbar.php';
?>

<?php if($added): ?>
<div class="notif show">
    ✅ Added to cart!
</div>
<?php endif; ?>

<div id="top"></div>

<?php if(isset($_GET['success'])): ?>
<div class="notif-success">
    🎉 Order berhasil!
</div>
<?php endif; ?>

<!-- HERO -->
<div class="hero">
    <h1>WELCOME TO OUR HOMECAFE</h1>
    <p>Taste the deliciousness of our handcrafted desserts and drinks.</p>
</div>

<!-- ABOUT -->
<div class="about">
    <h2>About Ny.Cakeu</h2>
    <div class="section-line"></div>
    <p>
        Ny.Cakeu is a homecafé that has been serving handcrafted desserts and drinks since 2021.
        Made with love in every process, we focus on quality, comfort, and authenticity.
    </p>
    <p>
        All of our products are freshly made <b>without preservatives</b>, so you can enjoy every bite with peace of mind.
    </p>
</div>

<!-- CALL -->
<div class="call">
    <h2>Need a Quick Order? Call Us!</h2>
    <p>We are ready to take your orders now.</p>

    <a class="btn" 
    href="https://wa.me/628123456789?text=Halo%20Ny.Cakeu,%20saya%20ingin%20order!" 
    target="_blank">
    💬 Order now via WhatsApp
    </a>

    <p class="time">Available from 9 AM to 9 PM (WIB)</p>
</div>

<?php if(isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'): ?>

<!-- 👑 ADMIN VIEW -->
<h2 class="section-title">Products</h2>
<div class="products">

<?php
$q = mysqli_query($conn,"SELECT * FROM products");
while($p=mysqli_fetch_assoc($q)){
?>
<div class="card">
<img src="uploads/<?= $p['image']; ?>">

<div class="card-body">
<h3><?= $p['name']; ?></h3>
<p><?= $p['description']; ?></p>

<div class="price">
Rp <?= number_format($p['price'],0,',','.'); ?>
</div>

<p><b>Stock:</b> <?= $p['stock']; ?></p>

<div style="margin-top:10px;">
    <a href="admin/edit_product.php?id=<?= $p['id']; ?>" class="btn">Edit</a>
    <a href="admin/delete_product.php?id=<?= $p['id']; ?>" class="btn">Delete</a>
    <a href="admin/add_stock.php?id=<?= $p['id']; ?>" class="btn">+ Stock</a>
</div>

</div>
</div>
<?php } ?>

</div>

<?php else: ?>

<!-- 👤 USER VIEW -->

<!-- DRINKS -->
<h2 class="section-title" id="drinks">Drinks</h2>
<div class="products">
<?php
$q = mysqli_query($conn,"SELECT * FROM products WHERE category='drink'");
while($p=mysqli_fetch_assoc($q)){
?>
<div class="card">
<img src="uploads/<?= $p['image']; ?>">
<div class="card-body">

<h3><?= $p['name']; ?></h3>
<p><?= $p['description']; ?></p>

<div class="price">
Rp <?= number_format($p['price'],0,',','.'); ?>
</div>

<p>Stock: <?= $p['stock']; ?></p>

<?php if($p['stock'] > 0): ?>
<form method="POST" action="#drinks">
    <input type="hidden" name="product_id" value="<?= $p['id']; ?>">
    <button class="btn">Add</button>
</form>
<?php else: ?>
<button class="btn" disabled style="background: gray;">
    Out of Stock
</button>
<?php endif; ?>

</div>
</div>
<?php } ?>
</div>

<!-- DESSERT -->
<h2 class="section-title" id="dessert">Dessert</h2>
<div class="products">
<?php
$q = mysqli_query($conn,"SELECT * FROM products WHERE category='dessert'");
while($p=mysqli_fetch_assoc($q)){
?>
<div class="card">
<img src="uploads/<?= $p['image']; ?>">
<div class="card-body">

<h3><?= $p['name']; ?></h3>
<p><?= $p['description']; ?></p>

<div class="price">
Rp <?= number_format($p['price'],0,',','.'); ?>
</div>

<p>Stock: <?= $p['stock']; ?></p>

<?php if($p['stock'] > 0): ?>
<form method="POST" action="#dessert">
    <input type="hidden" name="product_id" value="<?= $p['id']; ?>">
    <button class="btn">Add</button>
</form>
<?php else: ?>
<button class="btn" disabled style="background: gray;">
    Out of Stock
</button>
<?php endif; ?>

</div>
</div>
<?php } ?>
</div>

<?php endif; ?>

<!-- notif auto hide -->
<script>
setTimeout(() => {
    const notif = document.querySelector(".notif");
    if(notif){
        notif.classList.remove("show");
    }
}, 2000);
</script>

<script>
const isAdmin = <?= (isset($_SESSION['user']) && $_SESSION['user']['role']=='admin') ? 'true' : 'false' ?>;

if(!isAdmin){

    const home = document.querySelector(".nav-home");
    const drinks = document.querySelector(".nav-drinks");
    const dessert = document.querySelector(".nav-dessert");

    const drinksSection = document.getElementById("drinks");
    const dessertSection = document.getElementById("dessert");

    function setActive(menu){
        home.classList.remove("active");
        drinks.classList.remove("active");
        dessert.classList.remove("active");

        if(menu === "home") home.classList.add("active");
        if(menu === "drinks") drinks.classList.add("active");
        if(menu === "dessert") dessert.classList.add("active");
    }

    home.addEventListener("click", () => setActive("home"));
    drinks.addEventListener("click", () => setActive("drinks"));
    dessert.addEventListener("click", () => setActive("dessert"));

    window.addEventListener("scroll", () => {
        let scrollPos = window.scrollY + 150;

        if(scrollPos >= dessertSection.offsetTop){
            setActive("dessert");
        } 
        else if(scrollPos >= drinksSection.offsetTop){
            setActive("drinks");
        } 
        else {
            setActive("home");
        }
    });

}
</script>