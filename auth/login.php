<?php
session_start();
include '../config/database.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $q = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND password='$password'");
    $d = mysqli_fetch_assoc($q);

    if($d){
        $_SESSION['user'] = $d;
        header("Location: ../index.php");
        exit;
    } else {
        $error = "Email atau password salah!";
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

<h2 style="text-align:center; color:#d63384;">Login</h2>

<?php if(isset($error)): ?>
<p style="color:red; text-align:center;"><?= $error ?></p>
<?php endif; ?>

<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button class="btn" name="login">Login</button>

<p style="text-align:center; margin-top:10px;">
Belum punya akun? 
<a href="register.php" style="color:#d63384; font-weight:bold;">Register</a>
</p>

</form>
</div>

</body>
</html>