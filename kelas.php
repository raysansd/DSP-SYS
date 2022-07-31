<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}

include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>

			
				
				<legend><h1>Data Kelas</h1></legend>
				<hr>
				<br/>
				

					<a href="tambah_kelas.php" class="btn btn-primary">Tambah Data</a>
					<br>
					<br>
				<table border="1" class="table table-bordered table-striped">
					<tr>
						<th>No</th>
						<th>Nama Kelas</th>
                        <th width="500px">Nama Lengkap</th>
						<th width="180px">AKSI</th>
						
					</tr>
					<?php
					$kelas = mysqli_query($konek, "SELECT kelas.id_kelas, wali_kelas.nama_lengkap FROM kelas INNER JOIN wali_kelas USING (id_wali) ORDER BY id_kelas ASC ");
						$no=1;

					while($d=mysqli_fetch_array($kelas)){
						echo " <tr>
									<td>$no</td>
					 				<td>$d[id_kelas]</td>
									<td>$d[nama_lengkap]</td>
									<td>
										<a  class='btn btn-warning' href='edit_kelas.php?id_kelas=$d[id_kelas]'>Edit</a>
										<a class='btn btn-danger' href='hapus_kelas.php?id_kelas=$d[id_kelas]'>Hapus</a>
									</td>
								</tr>";
								$no++;
					}
					
					?>
				</table>
			
			</div>
<?php include "footer_admin.php"; ?>