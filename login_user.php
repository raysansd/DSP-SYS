<?php    
session_start();
include "koneksi.php";
						if(isset($_POST['login'])){
							//variable untuk menyimpan kiriman dari form
							$username = $_POST['username'];
							$password = md5($_POST['password']);

							if ($username=='' || $password =='') {
								echo "Lengakapi!!!";
							}else{

								//login 
								$login = mysqli_query($konek, "SELECT * FROM user WHERE username='$username' AND password='$password'");
				
								$jumlah_login_user = mysqli_num_rows($login);


								if ($jumlah_login_user > 0) {

    								$data_user = mysqli_fetch_assoc($login);	

									if ($data_user['keterangan'] == 'Admin') {
											
										$_SESSION['login'] = true;
										$_SESSION['nama_lengkap']=$data_user['nama_lengkap'];
										$_SESSION['username']=$data_user['username'];
										$_SESSION['password']=$data_user['password'];
										$_SESSION['keterangan']="Admin";
										

										header("location:./dashboard_admin.php");	
									}
									else if ($data_user['keterangan'] == 'Siswa') {
											
										$_SESSION['login'] = true;
										$_SESSION['nama_lengkap']=$data_user['nama_lengkap'];
										$_SESSION['username']=$data_user['username'];
										$_SESSION['password']=$data_user['password'];
										$_SESSION['keterangan']="Siswa";
										

										header("location:./dashboard_siswa.php");	
									}
									else if ($data_user['keterangan'] == 'WaliKelas') {
											
										$_SESSION['login'] = true;
										$_SESSION['nama_lengkap']=$data_user['nama_lengkap'];
										$_SESSION['username']=$data_user['username'];
										$_SESSION['password']=$data_user['password'];
										$_SESSION['keterangan']="WaliKelas";
										

										header("location:./dashboard_wali.php");	
									}
									
								}

					}
				}

					?>