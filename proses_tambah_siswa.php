<?php
session_start();
include "koneksi.php";

					if ( isset($_POST['simpan']) ) {
						//VARIABEL PENAMPUNG DATA FORM DIATAS
						$nis         = $_POST['nis'];
						$namasiswa   = $_POST['nama_siswa'];
						$namakelas   = $_POST['nama_kelas'];
						$tahunajaran = $_POST['tahun_ajaran'];
						$spp		= $_POST['spp'];
						$dsp 		= $_POST['dsp'];
						$awaltempo = $_POST['jatuh_tempo'];
						$bulanIndo = array(
							'01' => 'Januari',
							'02' => 'Februari',
							'03' => 'Maret',
							'04' => 'April',
							'05' => 'Mei',
							'06' => 'Juni',
							'07' => 'Juli',		
							'08' => 'Agustus',
							'09' => 'September',
							'10' => 'Oktober',
							'11' => 'November',
							'12' => 'Desember');

						$tambah = mysqli_query($konek, "INSERT INTO siswa(nis,nama_siswa,id_kelas,tahun_ajaran) VALUES('$nis','$namasiswa','$namakelas','$tahunajaran')");




							if ($tambah) {	
								$data_siswa = mysqli_fetch_array(mysqli_query($konek, "SELECT nis FROM siswa ORDER BY nis DESC LIMIT 1 "));
								$d_nis = $data_siswa['nis'];

								mysqli_query($konek, "INSERT INTO dsp(nis,jumlah) VALUES('$d_nis','$dsp')");


								for ($i=0; $i<12; $i++) { 
									$jatuh_tempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

									$bulan = $bulanIndo[date('m', strtotime($jatuh_tempo))]." ".date('Y',strtotime($jatuh_tempo));

									mysqli_query($konek, "INSERT INTO spp(nis,jatuh_tempo,jumlah_bayar_spp,bulan) VALUES('$d_nis','$jatuh_tempo','$spp','$bulan')");
								}

								header('location:siswa.php');
								

							}
							else{

								

								echo "gagal";
								echo $nis;
								echo $namasiswa;
								echo $namakelas;
								echo $tahunajaran;
								echo $dsp;
								echo $spp;
							}
						}			
?>