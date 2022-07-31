<?php
session_start();

$kelas_lama = $_SESSION['id_kelas'];

include 'koneksi.php';
					if (isset($_POST['update'])) {
						//VARIABEL PENAMPUNG DATA FORM DIATAS
						$wali = $_POST['nama_lengkap'];
						$kelas = $_POST['nama_kelas'];
						
					
						if ($kelas=='' || $wali=='' ) {
							echo "from lengkapi";
						}else{
							$update = mysqli_query($konek, "UPDATE kelas SET id_kelas='$kelas',
																			 id_wali='$wali'
																			 WHERE id_kelas='$kelas_lama'");
							if (!$update) {
								echo "gagal";
							}else{
								header('location:kelas.php');
								
							}
						}	
					}							
					?>
	