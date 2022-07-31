 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}

include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>

 <H1>Laporan Pembayaran</H1>
 <form method="get" action="pelaporan.php" target="_blank" class="form">
	 <div class="form-group">	
	 	Dari<input type="date" name="awal" class="form-control"  value="<?php echo date('Y-m-d'); ?>" />
	 	Sampai<input type="date" name="akhir" class="form-control" value="<?php echo date('Y-m-d'); ?>" >
	 	<br>
	 </div>	

 	<input type="submit" class="btn btn-primary" value="SPP" name="spp"> 	
 	<input type="submit" class="btn btn-primary" value="DSP" name="dsp">

 </form>
<br>
<br>
<br>
<br>
<br>
<br>

 <?php include "footer_admin.php"; 