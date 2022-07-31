<?php
session_start(); 
include "koneksi.php";
$last_name = $_SESSION['nama_guru'];


					if (isset($_POST['update'])) {
						//VARIABEL PENAMPUNG DATA FORM DIATAS						
						$nama = $_POST['nama_guru'];

						if ($nama=='') {
							echo "from lengkapi";
						}else{
							$update = mysqli_query($konek, "UPDATE wali_kelas SET 
																   nama_lengkap='$nama'
									    						   WHERE 
									    						   nama_lengkap='$last_name'");	
							if (!$update) {
								echo "gagal";
							}else{
								header('location:wali.php');
								

							
							}

						}	
					}
							
?>	