 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}

include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>

 <H1>Laporan Tunggakan</H1>
 <form method="get" action="penunggakan.php" target="_blank" class="form">

 	<input type="submit" class="btn btn-primary" value="SPP" name="spp"> 	
 	<input type="submit" class="btn btn-secondary" value="DSP" name="dsp">

 </form>
<br>
<br>
<br>
<br>
<br>
<br>

 <?php include "footer_admin.php"; 