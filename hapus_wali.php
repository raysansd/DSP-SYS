 <?php

session_start();
 include "koneksi.php";
 if(isset($_SESSION['login'])){

 	$hapus = mysqli_query($konek, "DELETE FROM wali_kelas WHERE nama_lengkap='$_GET[nama_lengkap]'");

 	if ($hapus) {
 		header('location:wali.php');
 	}else{
 		echo "Hapus Data Gagal <br>
 			<a href='wali.php'><<back</a>";
 	}
 }


 ?>