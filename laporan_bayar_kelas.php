 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./index.php');
}

include "koneksi.php";

?>
 <?php include "header_wali.php"; ?>

 <H1>Laporan Pembayaran</H1>
 <form method="get" action="pelaporan_kelas.php" target="_blank" class="form">
	 <div class="form-group">	
	 	Kelas<input type="text" name="kelas" class="form-control" />
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

 <?php include "footer.php"; 