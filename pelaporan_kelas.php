 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./index.php');
}

include "koneksi.php";

?>
<?php include"header_print.php";?>

<table class="table table-bordered table-stripped">
		<tr>
			<th width="10%" rowspan="5"><center><img src="Images/SMK.png"></center></th>
			<td colspan="3"><b><center>SEKOLAH MENEGAH KEJURUAN NEGERI 1 CIMAHI</center></b></td>
		</tr>
		<tr>	
			<td><center>1. Teknologi Rekayasa 2. Teknologi Informasi & Komunikasi 3. Seni & Industri Kreatif</center></td>
		</tr>
		<tr>	
			<td><center>JL. Mahar Martanegara No.48 Telp/Fax(022)6629683, Leuwigajah, Kota Cimahi 40533</center></td>
		</tr>
</table>
<br>

 <?php

 if (isset($_GET['spp'])) {
echo "
<center><H1>LAPORAN PEMBAYARAN SPP</H1></center>
<center><H3>Kelas : $_GET[kelas]</H3></center>
<br>
<br>";

	echo "
 			<table class='table table-bordered table-stripped' border='1' border-collapse='collapse' width='100%'>
 			  <tr>
				<th width>No</th>
				<th>NIS</th>
				<th>Nama Lengkap</th>
				<th>Kelas</th>
				<th>Nomor Bayar</th>
				<th>Tanggal Bayar</th>
				<th>Bulan</th>
				<th>Jumlah</th>
				<th>Keterangan</th>
			  </tr>";

 	$lapor_spp = mysqli_query($konek, "SELECT spp.*,siswa.nis,siswa.nama_siswa,siswa.id_kelas FROM spp INNER JOIN siswa USING (nis) WHERE siswa.id_kelas = '$_GET[kelas]' AND spp.no_bayar is NOT NULL ORDER BY siswa.nis ASC ");
 	$no=1;
 	$total_spp=0;

 	while ($data_spp=mysqli_fetch_array($lapor_spp)) {
 		echo "
 			<tr>
				<th>$no</th>
				<th>$data_spp[nis]</th>
				<th>$data_spp[nama_siswa]</th>
				<th>$data_spp[id_kelas]</th>
				<th>$data_spp[no_bayar]</th>
				<th>$data_spp[tanggal_bayar]</th>\
				<th>$data_spp[bulan]</th>
				<th>$data_spp[jumlah_bayar_spp]</th>
				<th>$data_spp[keterangan]</th>
			</tr>";
	$no++;	
	$total_spp += $data_spp['jumlah_bayar_spp'];		
}
		echo "
			<tr>
				<td colspan='7' align='right'><b>Total</b></td>
				<td>$total_spp</td>
			</tr>";
}

else if (isset($_GET['dsp'])) {
echo "<center><H1>LAPORAN PEMBAYARAN DSP</H1></center>
<center><H3>Kelas : $_GET[kelas]</H3></center>

<br>
<br>";
 	echo "
 			<table class='table table-bordered table-stripped' border='1' border-collapse='collapse' width='100%'>
 			  <tr>
				<th>No</th>
				<th>NIS</th>
				<th>Nama Lengkap</th>
				<th>Kelas</th>
				<th>Tanggal Bayar</th>
				<th>Sisa Sumbangan</th>

				
				
			  </tr>";

 	$lapor_dsp = mysqli_query($konek, "SELECT dsp.*,siswa.nis,siswa.nama_siswa,siswa.id_kelas FROM dsp INNER JOIN siswa USING (nis) WHERE siswa.id_kelas = '$_GET[kelas]' AND dsp.bayar is NOT NULL ORDER BY siswa.nis ASC");
 	$no=1;
 	$total_dsp=0;

 	while ($data_dsp=mysqli_fetch_array($lapor_dsp)) {
 		echo "
 			<tr>
				<th>$no</th>
				<th>$data_dsp[nis]</th>
				<th>$data_dsp[nama_siswa]</th>
				<th>$data_dsp[id_kelas]</th>
				<th>$data_dsp[tanggal_bayar]</th>
				<th>$data_dsp[jumlah]</th>
				
			</tr>";
	$no++;	
	$total_dsp += $data_dsp['jumlah'];		
}
		echo "
			<tr>
				<td colspan='5' align='right'><b>Total</b></td>
				<td>$total_dsp</td>
			</tr>";
}


 ?>


 