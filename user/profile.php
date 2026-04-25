<?php
session_start();
include '../includes/navbar.php';
$user=$_SESSION['user'];
?>

<div class="profile-box">

<h2>Profile</h2>

<p><strong>Nama:</strong> <?= $user['name']; ?></p>
<p><strong>Email:</strong> <?= $user['email']; ?></p>

<a class="btn" href="../index.php">← Home</a>

</div>