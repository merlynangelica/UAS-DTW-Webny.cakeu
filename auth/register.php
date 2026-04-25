<?php
session_start();
include '../config/database.php';

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $cek = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    
    if(mysqli_num_rows($cek) > 0){
        $error = "Email sudah terdaftar!";
    } else {
        mysqli_query($conn,"INSERT INTO users(name,email,password)
        VALUES('$name','$email','$password')");
        
        header("Location: login.php");
        exit;
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

<h2 style="text-align:center; color:#d63384;">Register</h2>

<?php if(isset($error)): ?>
<p style="color:red; text-align:center;"><?= $error ?></p>
<?php endif; ?>

<input type="text" name="name" placeholder="Nama" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button class="btn" name="register">Register</button>

<p style="text-align:center; margin-top:10px;">
Sudah punya akun? 
<a href="login.php" style="color:#d63384; font-weight:bold;">Login</a>
</p>

</form>
</div>

</body>
</html>