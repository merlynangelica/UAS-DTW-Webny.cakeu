<?php
session_start();

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;

    echo "success";
}
?>