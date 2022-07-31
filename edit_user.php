 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}

$_SESSION['id_user'] = $_GET['id_user'];
include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>
			
				<?php
				$edit = mysqli_query($konek, "SELECT * FROM user WHERE id_user='$_GET[id_user]'");
				$e=mysqli_fetch_array($edit);

				?>
				<h3>EDIT PENGGUNA</h3> 
				<form method="POST" action="proses_edit_user.php">		
					
						<table border="0">
							<tr>
								<td>Nama Lengkap</td>
								<td><input  class="form-control" type="text" name="nama_lengkap"  placeholder="Nama Lengkap" value="<?php echo $e['nama_lengkap']; ?>"></td>
							</tr>
							<tr>
								<td>Username</td>
								<td><input class="form-control" type="text" name="username"  placeholder="Username user" value="<?php echo $e['username']; ?>"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input class="form-control" type="password" name="password"  placeholder="Password Baru ">								
									<small>jika password tidak akan dirubah, kosongkan!</small>
								</td>
							</tr>
							<tr> 	
								<td>Jabatan</td>
								<td>
									<select name="keterangan" class="form-control">
										<?php
										$sqlKelas = mysqli_query($konek, "select * from user order by id_user ASC");
										while($k=mysqli_fetch_array($sqlKelas)){

											if($k['keterangan'] == $e['keterangan']){
												$selected = "selected";
											}else{
												$selected ="";
											}

											?>
											<option value="<?php echo $k['keterangan']; ?>" <?php echo $selected; ?>><?php echo $k['keterangan']; ?></option>
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