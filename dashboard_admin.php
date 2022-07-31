 <?php
session_start();
if (!isset($_SESSION['login'])) {
	header('location:./index.php');
}

include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>

<H1>Sistem pendataan DSP dan SPP SMK Negeri 1 Cimahi</H1>
<br>
<br>
 <?php include "footer_admin.php"; ?>