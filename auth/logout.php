<?php
session_start();
session_destroy();

// balik ke halaman login
header("Location: login.php");
exit;
?>