 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}

include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>

<legend><h1>Data Siswa</h1></legend>
				<hr>
				<br/>

 	<a href="tambah_siswa.php" class="btn btn-primary">Tambah Data</a>
 		<br>
 		<br/>

				<table border="1" class="table table-bordered table-striped">
					<tr class="info">
						<th>No.</th>
						<th>NIS</th>
						<th>Nama Siswa</th>
						<th>Kelas</th>
						<th>Tahun-Ajaran</th>
						<th>Aksi</th>
					</tr>
					<?php
					$sql = mysqli_query($konek, "SELECT siswa.*,kelas.id_kelas FROM siswa INNER JOIN kelas USING (id_kelas) ORDER BY nis ASC");

					$no=1;
					while($d=mysqli_fetch_array($sql)){
						echo " <tr>
									<td>$no</td>
									<td>$d[nis]</td>
									<td width='410px'>$d[nama_siswa]</td>
					 				<td width='150px'>$d[id_kelas]</td>
									<td>$d[tahun_ajaran]</td>
									<td>
										<a class='btn btn-warning' href='edit_siswa.php?nis=$d[nis]' >Edit</a>
										<a class='btn btn-danger' href='hapus_siswa.php?nis=$d[nis]'>Hapus</a>
									</td>
								</tr>";
								$no++;

					}
					?>
				</table>
				 

 <?php include "footer_admin.php"; ?>

				
			
	