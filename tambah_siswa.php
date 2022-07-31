 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}
include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>

					<br> 
					<h3>Tambah Data Siswa</h3>
					<br>

					<form method="POST" action="proses_tambah_siswa.php" class="form">		
						<table border="0">
							<tr>
								<td>NIS</td>
								<td><input class="form-control" type="text" name="nis" placeholder="NIS"></td>
							</tr>
							<tr>
								<td>Nama Siswa</td>
								<td><input type="text" class="form-control" name="nama_siswa"  placeholder="Nama Siswa"></td>
							</tr>
							<tr> 	
								<td>Kelas</td>
								<td>
									<select name="nama_kelas" class="form-control">
										<option  value="" selected>Pilih -- Kelas</option>
										<?php
										$kelas = mysqli_query($konek, "SELECT * FROM kelas ORDER BY id_kelas ASC");
										while ($data_kelas=mysqli_fetch_array($kelas)) {
											echo "<option value='$data_kelas[id_kelas]'>$data_kelas[id_kelas]</option>";
										}
										
										 ?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Tahun Ajaran</td>
								<td><input  class="form-control" type="text" value="2018-2019" name="tahun_ajaran"></td>
							</tr>
							<tr>
								<td>Biaya SPP</td>
								<td><input  class="form-control" type="text" value="150000" name="spp" readonly></td>
							</tr>
							<tr>
								<td>Biaya DSP</td>
								<td><input  class="form-control" type="text" value="6000000" name="dsp" readonly></td>
							</tr>
							<tr>
								<td>Jatuh Tempo Pertama</td>
								<td><input  class="form-control" type="text" value="2019-07-10" name="jatuh_tempo" readonly></td>
							</tr>
							<tr>
								<td></td>
								<td><input  class="btn btn-success" type="submit" value="Simpan" name="simpan"></td>
							</tr>	
						</table>
					</form>
					
	 <?php include "footer_admin.php"; ?>	