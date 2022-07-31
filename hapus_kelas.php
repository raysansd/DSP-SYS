 <?php

session_start();
 include "koneksi.php";
 if(isset($_SESSION['login'])){

 	$hapus = mysqli_query($konek, "DELETE FROM kelas WHERE id_kelas='$_GET[id_kelas]'");

 	if ($hapus) {
 		header('location:kelas.php');
 	}else{
 		echo "Hapus Data Gagal <br>
 			<a href='siswa.php'><<back</a>";
 	}
 }


 ?>