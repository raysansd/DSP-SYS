 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}

$_SESSION['id_kelas'] = $_GET['id_kelas'];
include "koneksi.php";
?>
 <?php include "header_admin.php"; ?>
			
				<?php
				$edit = mysqli_query($konek, "SELECT * FROM kelas WHERE id_kelas='$_GET[id_kelas]'");

				$e=mysqli_fetch_array($edit);

				?>
				<h3>EDIT SISWA</h3> 
				<form method="POST" action="proses_edit_kelas.php">		
					
						<table border="0">
							<tr>
								<td>Nama Kelas</td>
								<td><input  class="form-control" type="test" name="nama_kelas"  placeholder="Nama Kelas" value="<?php echo $e['id_kelas']; ?>"></td>
							</tr>
								
								<td>Wali Kelas</td>
								<td>
									<select name="nama_lengkap" class="form-control">
										<?php
										$wali = mysqli_query($konek, "select * from wali_kelas order by id_wali ASC");
										while($k=mysqli_fetch_array($wali)){

											if($k['id_wali'] == $e['id_wali']){
												$selected = "selected";
											}else{
												$selected ="";
											}

											?>
											<option value="<?php echo $k['id_wali']; ?>" <?php echo $selected; ?>><?php echo $k['nama_lengkap']; ?></option>
											<?php
										}
										?>
									</select>
								</td>
								</tr>
							<tr>
								<td></td>
								<td><input class="btn btn-success" type="submit" value="Update" name="update"></td>
							</tr>	
						</table>
					</form>
				


 <?php include "footer_admin.php"; ?>