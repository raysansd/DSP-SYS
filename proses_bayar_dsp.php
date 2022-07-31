<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
	if( isset($_POST['bayar'])){

		$iddsp 	= $_GET['id'];
		$nis	= $_GET['nis'];	
		$tanggal_bayar = date('Y-m-d');

		//proses bayar
		$bayar = $_POST['bayar_dsp'];
		$jumlah = $_GET['jumlah'];

		$sisa = $jumlah-$bayar;


		$update= mysqli_query($konek, "UPDATE dsp SET tanggal_bayar = '$tanggal_bayar',
													bayar = '$bayar',
													sisa = '$sisa'
											 		 WHERE id_dsp = '$iddsp'" );
								
									mysqli_query($konek, "INSERT INTO dsp(nis,jumlah) VALUES('$nis','$sisa')");
								

		
		header('location:bayar_dsp.php?nis='.$nis);
			
		}	



	


}
?>