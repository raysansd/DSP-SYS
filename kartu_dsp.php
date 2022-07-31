 <?php
session_start();
if (!isset($_SESSION['login'])) {
	header('location:./index.php');
}

include "koneksi.php";

?>
 <?php include "header.php"; ?>

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
				<th>Tanggal Bayar</th>
				<th>Besar Sumbangan</th>
				<th>Jumlah Pembayaran</th>
				<th>Sisa Sumbangan</th>
				<th>Aksi</th>
			</tr>
			
			<?php
				$dsp = mysqli_query($konek, "SELECT * FROM dsp WHERE nis='$data_siswa[nis]' ORDER BY nis ASC");
				$no=1;
				while ($data_dsp = mysqli_fetch_array($dsp)){
				echo "
					<tr>
						<td>$no</td>
						<td>$data_dsp[tanggal_bayar]</td>
						<td>$data_dsp[jumlah]</td>
						<td>$data_dsp[bayar]</td>
						<td>$data_dsp[sisa]</td>
						<td>";	
						if ($data_dsp['bayar']!='') {
							echo "<a class='btn btn-secondary' href='slip_dsp.php?nis=$nis&id=$data_dsp[id_dsp] target='blank'>Cetak</a> 
							";

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
}	
?>				 

 <?php include "footer.php"; ?>