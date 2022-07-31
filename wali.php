 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}

include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>

			<div id="content">
				<img src="Images/SMK.png">
				<legend><h1>Data Wali Kelas</h1></legend>
				<hr>
				<br/>

					<a href="tambah_wali.php" class="btn btn-primary">Tambah Data</a>
				<table border="1" class="table table-bordered table-striped">
					<tr>
						<th width="10px">No</th>
						<th width="700px">Nama Lengkap</th>
						<th>AKSI</th>
						
					</tr>
					<?php
					$sql = mysqli_query($konek, "SELECT * FROM wali_kelas");

					$no=1;
					while($d=mysqli_fetch_array($sql)){
						echo " <tr>
									<td>$d[id_wali]</td>
									<td>$d[nama_lengkap]</td>
					 				
									<td>
										<a href='edit_wali.php?nama_lengkap=$d[nama_lengkap]' class='btn btn-danger'>Edit</a>
										<a href='hapus_wali.php?nama_lengkap=$d[nama_lengkap]' class='btn btn-warning'>Hapus</a>
									</td>
								</tr>";
								$no++;

					}
					?>
				</table>
			
			
 <?php include "footer_admin.php"; ?>