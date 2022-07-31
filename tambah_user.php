 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}
include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>

					<br> 
					<h3>Tambah Pengguna</h3>
					<br>

					<form method="POST" action="proses_tambah_user.php" class="form">		
						<table border="0">
							<tr>
								<td>Nama Lengkap</td>
								<td><input class="form-control" type="text" name="nama_lengkap" placeholder="Nama Lengkap"></td>
							</tr>
							<tr>
								<td>Username</td>
								<td><input type="text" class="form-control" name="username"  placeholder="Username"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="Password" class="form-control" name="password"  placeholder="Password"></td>
							</tr>
							<tr> 	
								<td>Jabatan</td>
								<td>
									<select name="keterangan" class="form-control">
										<option  value="" selected>Pilih -- Jabatan</option>
										<?php
										$kelas = mysqli_query($konek, "SELECT * FROM user ORDER BY id_user ASC");
										while ($data_kelas=mysqli_fetch_array($kelas)) {
											echo "<option value='$data_kelas[id_user]'>$data_kelas[keterangan]</option>";
										}
										
										 ?>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input  class="btn btn-success" type="submit" value="Simpan" name="simpan"></td>
							</tr>	
						</table>
					</form>
					
	 <?php include "footer_admin.php"; ?>	