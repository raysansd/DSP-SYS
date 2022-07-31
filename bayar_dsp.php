 <?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:./admin.php');
}

include "koneksi.php";

?>
 <?php include "header_admin.php"; ?>

<legend><h1>Pembayaran</h1></legend>
<table class=" table-bordered table-striped">
		<form method="get" >
			<tr>
				<th width="">NIS</th>
				<td width=>:</td> 
				<td width=""><input  id="NIS" type="text" name="nis" class="form-control" width="10pt" /></td>
			</tr>
			<tr>
				<td><input type="submit" width="30px" name="cari" value="Search" class="btn btn-success"></td>
			</tr>
		</form>
	</table>
	<?php
		if (isset($_GET['nis']) && $_GET['nis']!='') {
			$siswa = mysqli_query($konek, "SELECT * FROM siswa WHERE nis='$_GET[nis]'");
			$data_siswa = mysqli_fetch_array($siswa);
			$nis = $data_siswa['nis'];
	?>

<br/>
<br/>
	<div class="card" >
		<legend>Data Siswa</legend>
		<table class=" table table-striped">
			<tr>
				<td width="200px">NIS</td>
				<td width="10px"> : </td>
				<td><?php echo $data_siswa['nis'];?></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td> : </td>
				<td><?php echo $data_siswa['nama_siswa'];?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td> : </td>
				<td><?php echo $data_siswa['id_kelas'];?></td>
			</tr>
		</table>
	</div>

	<div class="card">
		<legend>Data Tagihan Siswa</legend>
		<table class="table table-bordered">
			<tr>
				<th>No</th>
				<th>Besar Sumbangan</th>
				<th>Tanggal Bayar</th>
				<th>Jumlah Bayar</th>
				<th>Pembayaran</th>
				<th>Aksi</th>
			</tr>
			
			<?php
				$dsp = mysqli_query($konek, "SELECT * FROM dsp WHERE nis='$data_siswa[nis]'");
				$no=1;
				while ($data_dsp = mysqli_fetch_array($dsp)){
				echo "
					<tr>
						<td>$no</td>
						<td>$data_dsp[jumlah]</td>
						<td>$data_dsp[tanggal_bayar]</td>
						<td>$data_dsp[bayar]</td>
						<td>";
						if($data_dsp['bayar']==0){
							echo"
						<form class='form' method='post' action='./proses_bayar_dsp.php?nis=$nis&id=$data_dsp[id_dsp]&jumlah=$data_dsp[jumlah]'>
								<input type='text' name='bayar_dsp' id='dsp' class='form-control'>"; }else{echo "-";}
						echo"</td>
						<td>";	
						if ($data_dsp['bayar']==''){
							echo "<input  class='btn btn-success' type='submit' value='Bayar' name='bayar'>";
							}else{
								echo "-";
							}
							echo "</td>
					</tr>
							";
							$no++;
						}			
			?>
		</table>	
	</div>
<?php	
}?>	
<!-- BAYAR -->
 <div class="modal fade" id="modalbayar?nis=<?php echo $data_siswa['nis'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">	Pembayaran </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="./proses_bayar_dsp.php" method="post">
                      <div class="modal-body">
                          <div class="form-group">
                            <label>Jumlah Bayar</label>
                            <input type="text" class="form-control" name="bayar">
                          </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>
                      </div>
                      </form>
                    </div>
                  </div>
 </div>


 <?php include "footer_admin.php"; ?>