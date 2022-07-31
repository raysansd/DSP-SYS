'<?php
session_start();

$nis_lama = $_SESSION['nis'];

include 'koneksi.php';
					if (isset($_POST['update'])) {
						//VARIABEL PENAMPUNG DATA FORM DIATAS
						$nis = $_POST['nis'];
						$namasiswa = $_POST['nama_siswa'];
						$namakelas = $_POST['nama_kelas'];
						$tahunajaran = $_POST['tahun_ajaran'];

						if ($nis=='' || $namasiswa=='' ) {
							echo "from lengkapi";
						}else{
							$update = mysqli_query($konek, "UPDATE siswa SET nis='$nis',
																			 nama_siswa='$namasiswa',
																			 id_kelas='$namakelas',
																			 tahun_ajaran='$tahunajaran' WHERE nis='$nis_lama'");
							if (!$update) {
								echo "gagal";
							}else{
								header('location:siswa.php');
								
							}
						}	
					}							
					?>
	