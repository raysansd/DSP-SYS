 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}

$_SESSION['nis'] = $_GET['nis'];
include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>
			
				<?php
				$edit = mysqli_query($konek, "SELECT * FROM siswa WHERE nis='$_GET[nis]'");
				$e=mysqli_fetch_array($edit);

				?>
				<h3>EDIT SISWA</h3> 
				<form method="POST" action="proses_edit_siswa.php">		
					
						<table border="0">
							<tr>
								<td>NIS</td>
								<td><input  class="form-control" type="test" name="nis"  placeholder="NIS" value="<?php echo $e['nis']; ?>"></td>
							</tr>
							<tr>
								<td>Nama Siswa</td>
								<td><input class="form-control" type="test" name="nama_siswa"  placeholder="Nama Siswa" value="<?php echo $e['nama_siswa']; ?>"></td>
							</tr>
							<tr> 	
								<td>Kelas</td>
								<td>
									<select name="nama_kelas" class="form-control">
										<?php
										$sqlKelas = mysqli_query($konek, "select * from kelas order by id_kelas ASC");
										while($k=mysqli_fetch_array($sqlKelas)){

											if($k['id_kelas'] == $e['id_kelas']){
												$selected = "selected";
											}else{
												$selected ="";
											}

											?>
											<option value="<?php echo $k['id_kelas']; ?>" <?php echo $selected; ?>><?php echo $k['id_kelas']; ?></option>
											<?php
										}
										?>
									</select>
								</td>
								</tr>
							<tr>
								<td>Tahun Ajaran</td>
								<td><input class="form-control" type="text" value="2018-2019" name="tahun_ajaran"></td>
							</tr>
							<tr>
								<td></td>
								<td><input class="btn btn-success" type="submit" value="Update" name="update"></td>
							</tr>	
						</table>
					</form>
				


 <?php include "footer_admin.php"; ?>