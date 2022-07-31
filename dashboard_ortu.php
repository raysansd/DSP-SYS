<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:index.php');
}

include "koneksi.php";
?>
<?php include "header_ortu.php"; ?>

<?php include "footer.php"; ?>