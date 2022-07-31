<?php
session_start();
include "koneksi.php";
					if ( isset( $_POST['simpan'])) {  
						//VARIABEL PENAMPUNG DATA FORM DIATAS
						
						$namalengkap = mysqli_real_escape_string($konek, $_POST['nama_guru']);
						
						if ($namalengkap=='' ) {
							echo "from lengkapi";
						}else{

							$simpan=mysqli_query($konek, "INSERT INTO wali_kelas(nama_lengkap) VALUES ('$namalengkap')");

							if (!$simpan) {
								echo "gagal";

							}else{
								header('location:wali.php');
							}

					}
					
				}	
	?>