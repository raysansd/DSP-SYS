<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}

include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>

				<legend><h1>Tambah Data Kelas</h1></legend>
				<hr>
				<br/>
				<form method="post" action="proses_tambah_kelas.php" class="form">
					<table>
						<tr>
							<td>Kelas</td>
							<td><input  class="form-control" type="text" name="nama_kelas" ></td>
						</tr>
						<tr>
							<td>Pilih Guru / Wali Kelas</td>
							<td>
								<select  class="form-control" name="nama_guru">
									<option value="" selected>- Pilih Guru -</option>
									<?php
									$guru=mysqli_query($konek, "SELECT * FROM wali_kelas ORDER BY id_wali ASC");
									while($g=mysqli_fetch_array($guru)){
										echo "<option value='$g[id_wali]'>$g[nama_lengkap]</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input  name="simpan" class="btn btn-success" type="submit" value="simpan"></td>
						</tr>
					</table>	
					<br>
				</form>
					
			

 <?php include "footer_admin.php"; ?>