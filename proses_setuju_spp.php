<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	if($_GET['aksi']=='terima'){

		$idspp 	= $_GET['id'];
		$nis	= $_GET['nis'];	

		//no mayar
		$today = date("Ymd");
		$nobayar = mysqli_query($konek, "SELECT max(no_bayar) AS last FROM spp WHERE no_bayar LIKE '$today%'");
		$data = mysqli_fetch_array($nobayar);
		$last_no_bayar	= $data['last'];
		$last_no_urut   = substr($last_no_bayar, 8,4); 
		$next_no_urut   = $last_no_urut + 1;
		$next_no_bayar	= $today.sprintf('%04s', $next_no_urut);

		$tanggal_bayar = date('Y-m-d');


		mysqli_query($konek, "UPDATE spp SET no_bayar = '$next_no_bayar',
											 tanggal_bayar = '$tanggal_bayar',
											 keterangan = 'LUNAS'
											 WHERE id_spp = '$idspp'" );
		header('location:setuju_spp.php?nis='.$nis);
			}
		else if($_GET['aksi'] == 'tolak'){

			$idspp 	= $_GET['id'];
			$nis	= $_GET['nis'];	

			mysqli_query($konek, "UPDATE spp SET keterangan = ''
											 WHERE id_spp = '$idspp'");

		header('location:setuju_spp.php?nis='.$nis);
	


		}


}
?>