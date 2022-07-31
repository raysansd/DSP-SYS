<?php
session_start();
include "koneksi.php";
					if ( isset($_POST['simpan']) ) {
						//VARIABEL PENAMPUNG DATA FORM DIATAS
						$nama   = mysqli_real_escape_string($konek, $_POST['nama_lengkap']);
						$user   = mysqli_real_escape_string($konek, $_POST['username']);
						$pass   = mysqli_real_escape_string($konek, $_POST['password']);
						$ket    = mysqli_real_escape_string($konek, $_POST['keterangan']);

						$tambah = mysqli_query($konek, "INSERT INTO user(nama_lengkap,username,password,keterangan) VALUES('$nama','$user',md5('$pass'),'$ket')");

						if (!$tambah) {

							echo "gagal";
							
						}else{
							header('location:user.php');
						}
					}			
?>