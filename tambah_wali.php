<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}

include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>

		
				<img src="Images/SMK.png">
				<legend><h1>Tambah Data Siswa</h1></legend>
				<hr>
				<br/>

					<form method="POST" action="proses_tambah_wali.php">		
						<table border="0">
							<tr>
								<td>Nama Lengkap</td>
								<td><input type="text" name="nama_guru" placeholder="Nama Lengkap" class="form-control"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="simpan" name="simpan" class="btn btn-success"></td>
							</tr>	
						</table>
					</form>
					
<?php include "footer_admin.php"; ?>

