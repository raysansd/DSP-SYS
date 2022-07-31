<?php
session_start();
include "koneksi.php";
					if (isset($_POST['simpan'])) {
						//VARIABEL PENAMPUNG DATA FORM DIATAS
						$kelas = $_POST['nama_kelas'];
						$guru  = $_POST['nama_guru'];
					

						$tambah = mysqli_query($konek, "INSERT INTO kelas(id_kelas,id_wali) values ('$kelas','$guru')");

						if (!$tambah) {
							echo "gagal";
						}else{
							header('location:kelas.php');
						}
					}			
?>