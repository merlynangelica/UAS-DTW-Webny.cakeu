<?php
session_start();
include '../config/database.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $q = mysqli_query($conn,"
    SELECT * FROM users 
    WHERE email='$email'
    AND role='admin'
    ");

    $d = mysqli_fetch_assoc($q);

    if($d && password_verify($password, $d['password'])){

        $_SESSION['user'] = $d;

        header("Location: ../index.php");
        exit;

    } else {
        $error = "Admin account not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="center-box">
<form method="POST">

<h1 class="logo-login">Ny.Cakeu</h1>

<h2 style="text-align:center; color:#d63384;">
Admin Login
</h2>

<?php if(isset($error)): ?>
<p style="color:red; text-align:center;">
<?= $error ?>
</p>
<?php endif; ?>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button class="btn" name="login">
Login
</button>

<p style="text-align:center; margin-top:10px;">
<a href="login.php" style="color:#d63384; font-weight:bold;">
Back to User Login
</a>
</p>

</form>
</div>

</body>
</html>