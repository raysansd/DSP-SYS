<?php    
session_start();
include "koneksi.php";
						if($_SERVER['REQUEST_METHOD']=='POST'){
							//variable untuk menyimpan kiriman dari form
							$user = $_POST['username'];
							$pass = $_POST['password'];

							if ($user=='' || $pass =='') {
								echo "Lengakapi!!!";
							}else{
								include "koneksi.php";
								$sqllogin = mysqli_query($konek, "SELECT * FROM admin_tu WHERE username='$user' AND password='$pass' ");
								$jml = mysqli_num_rows($sqllogin);
								$d = mysqli_fetch_array($sqllogin);

								if ($jml > 0) {
									$_SESSION['login'] = true;
									$_SESSION['id'] = $d['idadmin'];
									$_SESSION['username']=$d['username'];

									header('location:./dashboard_admin.php');
								}
								else{
									echo "Username atau Password salah";
								}
							}

					}

					?>