<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	include '/Applications/XAMPP/xamppfiles/htdocs/surat-keterangan-desa/konek.php';
	
	if (!$konek) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>  
 <!-- <?php
	$tampil_nik = "SELECT * FROM data_user WHERE nik=$_SESSION[nik]";
	$query = mysqli_query($konek,$tampil_nik);
	$data = mysqli_fetch_array($query,MYSQLI_BOTH);
	$nik = $data['nik'];
	$nama = $data['nama'];
?>  -->
<div class="page-inner">
					<div class="row">
						<div class="col-md-12">	
						<form method="POST" enctype="multipart/form-data">
							<div class="card">
								<div class="card-header">
									<div class="card-title">FORM REQUEST LEMBAR DISPOSISI</div>
								</div>
								<div class="card-body">
									<div class="row">
											<div class="col-md-6 col-lg-6">
											<div class="form-group">
													<label>NIK</label>
													<input type="text" class="form-control" value="<?= $nik.' - '.$nama;?>" readonly>
												</div>
												<div class="form-group">
													<input type="hidden" name="nik" class="form-control" value="<?= $nik;?>" readonly>
												</div>
												<div class="form-group">
													<label>Dari</label>
													<input type="text" name="dari" class="form-control" autofocus>
												</div>
												<div class="form-group">
													<label>Nomor Surat</label>
													<input type="text" name="no_surat" class="form-control" autofocus>
												</div>
												<div class="form-group">
													<label>Tanggal Surat</label>
													<input type="date" name="tanggal_surat" class="form-control" autofocus>
												</div>
												<div class="form-group">
													<label>Jam Diterima</label>
													<input type="time" name="jam_diterima" class="form-control" autofocus>
												</div>
												<div class="form-group">
													<label>Perihal</label>
													<input type="text" name="perihal" class="form-control" autofocus>
												</div>
												<div class="form-group">
													<label>Tanggal Masuk</label>
													<input type="date" name="tanggal_masuk" class="form-control" autofocus>
												</div>
											</div>
											<div class="col-md-6 col-lg-6">		
												<div class="form-group">
													<label>No. Agenda</label>
													<input type="text" name="no_agenda" class="form-control" size="37" required>
												</div>
											</div>
											<div class="col-md-6 col-lg-6">		
												<div class="form-group">
													<label>Catatan</label>
													<input type="text" name="catatan" class="form-control" size="37" required>
												</div>
											</div>
									</div>
								</div>
								<div class="card-action">
									<button name="kirim" class="btn btn-success">Kirim</button>
									<a href="?halaman=beranda" class="btn btn-default">Batal</a>
								</div>
							</div>
						</div>
						</form>
					</div>
</div>

<?php
if(isset($_POST['kirim'])){
	$nik = $_POST['nik'];
	$dari = $_POST['dari'];
	$no_agenda = $_POST['no_agenda'];
		$nomor_surat = $_POST['no_surat'];
		$tanggal_surat = $_POST['tanggal_surat'];
		$jam_diterima = $_POST['jam_diterima'];
		$perihal = $_POST['perihal'];
		$tanggal_masuk = $_POST['tanggal_masuk'];
		$catatan = $_POST['catatan'];
	$sql = "INSERT INTO lembar_disposisi (dari,no_agenda,no_surat,tanggal_surat,jam_diterima,perihal,tanggal_masuk,catatan,nik) VALUES ('$dari', '$no_agenda', '$nomor_surat', '$tanggal_surat', '$jam_diterima', '$perihal', '$tanggal_masuk', '$catatan', '$nik')";
	$query = mysqli_query($konek,$sql) or die (mysqli_error($konek));

	if($query){
		
		echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	  }else{
		echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>" ;
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_sktm">';
	  }
}
	
?>