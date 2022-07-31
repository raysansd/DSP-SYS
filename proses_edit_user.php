'<?php
session_start();

$id_lama = $_SESSION['id_user'];

include 'koneksi.php';
					if (isset($_POST['update'])) {
						//VARIABEL PENAMPUNG DATA FORM DIATAS
						$nama = $_POST['nama_lengkap'];
						$user = $_POST['username'];
						$pass = $_POST['password'];
						$ket = $_POST['keterangan'];

						if (empty($nama)) {
							echo "from lengkapi";
						}else{
								if(empty($password)){
								$update = mysqli_query($konek, "UPDATE user SET nama_lengkap='$nama',
																				 username='$user',
																				 keterangan='$ket' WHERE id_user='$id_lama'");
								}
								else{
								$update = mysqli_query($konek, "UPDATE user SET nama_lengkap='$nama',
																			 username='$user',
																			 password=md5('$pass'),
																			 keterangan='$ket' WHERE id_user='$id_lama'");
								}
									if (mysqli_query($konek, $update) > 0) {
										echo "gagal";
									}else{
										header('location:user.php');
										
									}
						}	
					}							
					?>
	