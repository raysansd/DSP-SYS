 <?php

session_start();
 include "koneksi.php";
 if(isset($_SESSION['login'])){

 	$hapus = mysqli_query($konek, "DELETE FROM user WHERE id_user='$_GET[id_user]'");

 	if ($hapus) {
 		header('location:user.php');
 	}else{
 		echo "Hapus Data Gagal <br>
 			<a href='siswa.php'><<back</a>";
 	}
 }


 ?>