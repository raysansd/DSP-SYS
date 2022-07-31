ty  <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}

include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>

			
				<legend><h1>Data User</h1></legend>
				<hr>
				<br/>

					<a href="tambah_user.php" class="btn btn-primary">Tambah Data</a>
					<br>
					<br>
				<table border="1" class="table table-bordered table-striped">
					<tr>
						<th >No</th>
						<th >Nama Lengkap</th>
						<th>Username</th>
						<th>Keterangan</th>
						<th>AKSI</th>
						
					</tr>
					<?php
					$sql = mysqli_query($konek, "SELECT * FROM user");

					$no=1;
					while($d=mysqli_fetch_array($sql)){
						echo " <tr>
									<td>$d[id_user]</td>
									<td>$d[nama_lengkap]</td>
									<td>$d[username]</td>
									<td>$d[keterangan]</td>
					 				
									<td>
										<a href='edit_user.php?id_user=$d[id_user]' class='btn btn-danger'>Edit</a>
										<a href='hapus_user.php?id_user=$d[id_user]' class='btn btn-warning'>Hapus</a>
									</td>
								</tr>";
								$no++;

					}
					?>
				</table>
			
			
 <?php include "footer_admin.php"; ?>