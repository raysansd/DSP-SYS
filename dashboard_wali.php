<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:index.php');
}

include "koneksi.php";
?>
<?php include "header_wali.php"; ?>

<?php include "footer.php"; ?>