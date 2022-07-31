 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}

include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>

<legend><h1>Pembayaran</h1></legend>
	<table class=" table-bordered table-striped">
		<form method="get" >
			<tr>
				<th width="">NIS</th>
				<td width=>:</td> 
				<td width=""><input  id="NIS" type="text" name="nis" class="form-control" width="10pt" /></td>
			</tr>
			<tr>
				<td><input type="submit" width="30px" name="cari" value="Search" class="btn btn-success"></td>
			</tr>
		</form>
	</table>
	<?php

		if (isset($_GET['nis']) && $_GET['nis']!='') {
			$siswa = mysqli_query($konek, "SELECT * FROM siswa WHERE nis='$_GET[nis]'");
			$data_siswa = mysqli_fetch_array($siswa);
			$nis = $data_siswa['nis'];
		

	?>

<br/>
<br/>
	<div class="card" >
		<legend>Data Siswa</legend>
		<table class=" table table-striped">
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

	<div class="card">
		<legend>Data Tagihan Siswa</legend>
		<table class="table table-bordered">
			<tr>
				<th>No</th>
				<th>Bulan</th>
				<th>Jatuh Tempo</th>
				<th>Tanggal Bayar</th>
				<th>Nomor Bayar</th>
				<th>Jumlah Bayar</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
			
			<?php
				$spp = mysqli_query($konek, "SELECT * FROM spp WHERE nis='$data_siswa[nis]' ORDER BY jatuh_tempo ASC");
				$no=1;
				while ($data_spp = mysqli_fetch_array($spp)){
				echo "
					<tr>
						<td>$no</td>
						<td>$data_spp[bulan]</td>
						<td>$data_spp[jatuh_tempo]</td>
						<td>$data_spp[tanggal_bayar]</td>
						<td>$data_spp[no_bayar]</td>
						<td>$data_spp[jumlah_bayar_spp]</td>
						<td>$data_spp[keterangan]</td>
						<td>";	
						if ($data_spp['no_bayar']=='') {
							echo "<a  class='btn btn-success' href='proses_transaksi.php?nis=$nis&act=bayar&id=$data_spp[nis]'>Terima</a> 
							<a class='btn btn-danger' href='proses_transaksi.php?nis=$nis&act=batal&id=$data_spp[nis]'>Tolak</a>";

							}else{
								echo "-";
							}
							echo "</td>
					</tr>
							";
							$no++;
						}			
			?>
		</table>	
	</div>
<?php	
}?>				 

 <?php include "footer_admin.php"; ?>