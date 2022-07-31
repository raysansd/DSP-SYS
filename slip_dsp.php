 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
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
<br>
<?php
echo "
<center><H1>BUKTI PEMBAYARAN DSP</H1></center>
<center><H3>2019-2020</H3></center>
<br>
<br>";
	$siswa = mysqli_query($konek, "SELECT * FROM siswa WHERE nis='$_GET[nis]'");
	$data_siswa=mysqli_fetch_array($siswa);

?>
<div class="card" >
		
		<table border="0" class=" table table-striped">
			<tr>
				<td width="200px">NIS</td>
				<td width="10px"> : </td>
				<td><?php echo $data_siswa['nis'];?></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td> : </td>
				<td><?php echo $data_siswa['nama_siswa'];?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td> : </td>
				<td><?php echo $data_siswa['id_kelas'];?></td>
			</tr>
		</table>
	</div>
	<br>
	<br>
	<br>
 <?php

 	echo "
 			<table class='table table-bordered table-stripped' border='1'>
 			  <tr>
 			  	<th width='2%'>No</th>
				<td align='center'>Tanggal Bayar</td>
				<th>Besar Sumbangan</th>
				<th>Jumlah Pembayaran</th>
				<th>Sisa Sumbangan</th>
			  </tr>";

 	$bukti_dsp = mysqli_query($konek, "SELECT * FROM dsp WHERE id_dsp='$_GET[id]' ORDER BY id_dsp ASC ");
 	$no=1;
 	while ($data_dsp=mysqli_fetch_array($bukti_dsp)) {
 		echo "
 			<tr>
 				<td>$no</td>
				<td align='center'>$data_dsp[tanggal_bayar]</td>
				<td>$data_dsp[jumlah]</td>
				<td>$data_dsp[bayar]</td>
				<td>$data_dsp[sisa]</td>
			</tr>";
			$no++;
			
}
		





 ?>


 