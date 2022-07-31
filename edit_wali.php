<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}
$_SESSION['nama_guru'] = $_GET['nama_lengkap'];
include "koneksi.php";
?>
 <?php include "header_admin.php"; ?>

				
				<?php
				$edit = mysqli_query($konek, "SELECT * FROM wali_kelas WHERE nama_lengkap='$_GET[nama_lengkap]'");
				$e=mysqli_fetch_array($edit);

				?>
				<h3>EDIT WALI KELAS</h3>
				<form method="POST" action="proses_edit_wali.php">		
					
						<table border="0" >
							<tr>
								<td>Nama Lengkap</td>
								<td><input type="text" name="nama_guru" class="form-control" placeholder="Nama Lengkap" value="<?php echo $e['nama_lengkap']; ?>"></td>
							<tr>
								<td></td>
								<td><input type="submit" value="simpan" name="update" class="btn btn-success"></td>
							</tr>	
						</table>
					</form> 
				
		 <?php include "footer_admin.php"; ?>