<?php
session_start();
session_destroy();

// kembali ke halaman login
header('location:./index.php')
?>