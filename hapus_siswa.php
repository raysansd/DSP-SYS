 <?php

session_start();
 include "koneksi.php";
 if(isset($_SESSION['login'])){

 	$hapus = mysqli_query($konek, "DELETE FROM siswa WHERE nis='$_GET[nis]'");

 	if ($hapus) {
 		header('location:siswa.php');
 	}else{
 		echo "Hapus Data Gagal <br>
 			<a href='siswa.php'><<back</a>";
 	}
 }


 ?>