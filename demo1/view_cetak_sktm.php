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

<style>
    .line {
        border-bottom: 1px solid black;
        height: 20px;
        margin: 5px -15px;
    }
    .footer {
        display: flex;
        justify-content: space-between;
        align-items: flex;
        width: 96.5%;
    }
    .footer-left, .footer-right {
        width: 45%;
    }
    .signature-box {
        border: 1px solid black;
        /* padding: 0px; */
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        height: 70px;
    }
    .signature-box .left,
    .signature-box .right {
        width: 45%;
    }
    .signature-box .right {
        border-left: 1px solid black;
        height: 69px;
        width: 150px;
    }
    .label {
        display: flex;
        justify-content: space-between;
    }
    .label div {
        width: 30%;
    }
    .label div:last-child {
        text-align: right;
    }
</style>

<?php
	if(isset($_GET['id_disposisi'])){
		$id=$_GET['id_disposisi'];
		$sql = "SELECT * FROM lembar_disposisi natural join data_user WHERE id_disposisi='$id'";
		$query = mysqli_query($konek,$sql);
        $data = mysqli_fetch_array($query,MYSQLI_BOTH);
        $id=$data['id_disposisi'];
        $dari=$data['dari'];
        $no_agenda=$data['no_agenda'];
        $no_surat=$data['no_surat'];
        $tanggal_surat=$data['tanggal_surat'];
        $format = date('d F Y', strtotime($tanggal_surat));
        $jam_diterima=$data['jam_diterima'];
        $perihal=$data['perihal'];
        $tanggal_masuk=$data['tanggal_masuk'];
        $format2 = date('d F Y', strtotime($tanggal_masuk));
       
        // $request = $data['request'];
        $keterangan = $data['keterangan'];
        $status = $data['status'];
        $acc = $data['acc'];
        $format4 = date('d F Y', strtotime($acc));
        if($format4==0){
            $format4="kosong";
        }elseif($format4==1){
           $format4;
        }

        if($status==3){
            $keterangan="Sudah ACC Lurah, surat sedang dalam proses cetak oleh staf";
        }

        $catatan = $data['catatan']; // Ambil catatan dari database
        $catatan_baris = explode("\n", $catatan); // Pisahkan catatan menjadi baris-baris
	}
?>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
                <h2 class="text-white pb-2 fw-bold"></h2>
			</div>
		</div>
	</div>
</div>

                <div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
								    <div class="card-tools">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                            <label>Keterangan</label>
                                                <select name="dicetak" id="" class="form-control" required="">
                                                    <option value="">Pilih</option>
                                                    <option value="Surat dicetak, bisa diambil!">Surat dicetak, bisa diambil!</option>
                                                </select><br>
                                                <!-- <input type="date" name="tgl_acc" class="form-control"> -->
                                                    <input type="submit" name="ttd" value="Kirim" class="btn btn-primary btn-sm">
                                                    <a href="cetak_sktm.php?id_disposisi=<?=$id;?>" class="btn btn-primary btn-sm">Cetak</a>
                                                <!-- <div class="form-group">
                                                    <a href="cetak_skd.php?id_request_skd=<?php $id;?>">
                                                        Cetak
                                                    </a>
                                                </div> -->
                                                <!-- <div class="form-group">
                                                   <a href="cetak_skd.php?id_request_skd=<?=$id;?>">a</a>
                                                </div> -->
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['ttd'])){
                                            $cetak = $_POST['dicetak'];
                                            $update = mysqli_query($konek,"UPDATE lembar_disposisi SET keterangan='$cetak', status=3 WHERE id_disposisi=$id");
                                            if($update){
                                                echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>" ;
                                                echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_sktm">';
                                            }else{
                                                echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>" ;
                                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_sktm">';
                                            }

                                        }
                                        ?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table border="0" align="center" style="width: 100%;">
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr>
                                            <td colspan="6" align="center">
                                                <center>
                                                    <img src="img/KPU.png" width="70" height="87" alt=""><br>
                                                    <font size="5">KETUA KOMISI PEMILIHAN UMUM</font><br>
                                                    <font size="5">KOTA MOJOKERTO</font><br>
                                                    <font size="4"><b><u>LEMBAR DISPOSISI</u></b></font><br>
                                                </center>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:left; width: 10%;">Dari</td>
                                            <td style="width: 2%;">:</td>
                                            <td style="text-align:left; width: 30%;"><?php echo $dari; ?></td>
                                            <td style="text-align:right; width: 25%;">No. Agenda</td>
                                            <td style="width: 2%;">:</td>
                                            <td style="text-align:left; width: 20%;"><?php echo $no_agenda; ?></td>
                                        </tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr>
                                            <td style="text-align:left;">Nomor Surat</td>
                                            <td>:</td>
                                            <td style="text-align:left;"><?php echo $no_surat; ?></td>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr>
                                            <td style="text-align:left;">Tanggal Surat</td>
                                            <td>:</td>
                                            <td style="text-align:left;"><?php echo $format; ?></td>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr>
                                            <td style="text-align:left;">Jam Diterima</td>
                                            <td>:</td>
                                            <td style="text-align:left;"><?php echo $jam_diterima; ?></td>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr>
                                            <td style="text-align:left;">Perihal</td>
                                            <td>:</td>
                                            <td style="text-align:left;"><?php echo $perihal; ?></td>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr>
                                            <td style="text-align:left;">Tanggal Masuk</td>
                                            <td>:</td>
                                            <td style="text-align:left;"><?php echo $format2; ?></td>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                    </table>
                                    <hr style="margin:2px; color:black; height:1.5px; background-color:black; border:none;">
                                    <hr style="margin:2px; color:black; height:1.5px; background-color:black; border:none;">
                                    
                                    <table style="width: 100%;">
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <tr><td></td></tr>
                                        <!-- Baris 1 -->
                                        <tr>
                                            <td style="width: 4%;">
                                                Yth.
                                            </td>
                                            <td style="width: 43%;"> 
                                                <input type="checkbox" id="ketua">
                                                <label for="ketua" class="checkbox-label">Ketua / Divisi Keuangan, Umum, Logistik dan Rumah Tangga</label>
                                            </td>
                                            <td style="width: 10%;"></td>
                                            <td style="width: 43%;">
                                                <input type="checkbox" id="hukum">
                                                <label for="hukum" class="checkbox-label">Divisi Hukum dan Pengawasan</label>
                                            </td>
                                        </tr>
                                        <!-- Baris 2 -->
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" id="teknis">
                                                <label for="teknis" class="checkbox-label">Divisi Teknis Penyelenggaraan Pemilu</label>
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" id="perencanaan">
                                                <label for="perencanaan" class="checkbox-label">Divisi Perencanaan Data dan Informasi</label>
                                            </td>
                                        </tr>
                                        <!-- Baris 3 -->
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" id="sosialisasi">
                                                <label for="sosialisasi" class="checkbox-label">Divisi Sosialisasi, Pendidikan Pemilih, Parmas dan SDM</label>
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" id="sdr">
                                                <label for="sdr" class="checkbox-label">Sdr. ............................................................</label>
                                            </td>
                                        </tr>
                                    </table>

                                    <br>

                                    <table style="width: 100%;">
                                        <!-- Baris Sifat -->
                                        <tr>
                                            <td style="width: 4%;">Sifat :</td>
                                            <td style="width: 43%;">
                                                <input type="checkbox" id="biasa">
                                                <label for="biasa" class="checkbox-label">Biasa</label>
                                            </td>
                                            <td style="width: 10%;"></td>
                                            <td style="width: 43%;">
                                                <input type="checkbox" id="perhatian-khusus">
                                                <label for="perhatian-khusus" class="checkbox-label">Perlu Perhatian Khusus</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        <td>
                                                <input type="checkbox" id="teknis">
                                                <label for="teknis" class="checkbox-label">Mendesak</label>
                                            </td>
                                            <td></td>
                                            <td>
                                                <input type="checkbox" id="perencanaan">
                                                <label for="perencanaan" class="checkbox-label">Perlu Perhatian Batas Waktu</label>
                                            </td>
                                        </tr>
                                    </table>

                                    <br>
                                    
                                    <table style="width: 100%;">
                                        <!-- Baris Mohon bantuan Saudara untuk -->
                                        <tr>Mohon bantuan Saudara untuk :</tr>
                                        <tr>
                                            <td style="width: 4%;"></td>
                                            <td style="width: 43%;">
                                                <input type="checkbox" id="dokumentasi">
                                                <label for="dokumentasi" class="checkbox-label">Dokumentasi/File</label><br>
                                                <input type="checkbox" id="mewakili">
                                                <label for="mewakili" class="checkbox-label">Mohon hadir mewakili saya</label><br>
                                                <input type="checkbox" id="membicarakan">
                                                <label for="membicarakan" class="checkbox-label">Membicarakan dengan saya</label><br>
                                                <input type="checkbox" id="jawaban">
                                                <label for="jawaban" class="checkbox-label">Membuat jawaban/tanggapan</label><br>
                                                <input type="checkbox" id="hadir">
                                                <label for="hadir" class="checkbox-label">Ikut hadir</label><br>
                                                <input type="checkbox" id="memantau">
                                                <label for="memantau" class="checkbox-label">Memantau</label><br>
                                                <input type="checkbox" id="konsep">
                                                <label for="konsep" class="checkbox-label">Menyiapkan konsep / bahan</label>
                                            </td>
                                            <td style="width: 10%;"></td>
                                            <td style="width: 43%;">
                                                <input type="checkbox" id="informasi">
                                                <label for="informasi" class="checkbox-label">Diketahui/sbg. Informasi</label><br>
                                                <input type="checkbox" id="saran">
                                                <label for="saran" class="checkbox-label">Mempelajari dan memberikan saran</label><br>
                                                <input type="checkbox" id="tindaklanjut">
                                                <label for="tindaklanjut" class="checkbox-label">Melaksanakan/menindaklanjuti</label><br>
                                                <input type="checkbox" id="prosedur">
                                                <label for="prosedur" class="checkbox-label">Memproses sesuai prosedur</label><br>
                                                <input type="checkbox" id="selesai">
                                                <label for="selesai" class="checkbox-label">Menyelesaikan sebelum batas waktu</label><br>
                                                <input type="checkbox" id="koordinasi">
                                                <label for="koordinasi" class="checkbox-label">Mengkoordinasikan</label><br>
                                                <input type="checkbox" id="arsip">
                                                <label for="arsip" class="checkbox-label">Arsip Tata Usaha</label>
                                            </td>
                                        </tr>
                                    </table>

                                    <br>
                                    
                                    <table>
                                        <tr>Catatan :</tr>   
                                    </table>

                                    <div class="container">
                                        <div class="notes">
                                            <?php
                                            // Menampilkan catatan ke dalam div line
                                            foreach ($catatan_baris as $baris) {
                                                echo '<div class="line">' . htmlspecialchars($baris) . '</div>';
                                            }
                                            // Menambahkan div kosong jika kurang dari 7 baris
                                            $jumlah_baris = count($catatan_baris);
                                            for ($i = $jumlah_baris; $i < 7; $i++) {
                                                echo '<div class="line"></div>';
                                            }
                                            ?>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="footer-left" style="float: left; width: 50%;">
                                                <p>Terima kasih,</p>
                                        </div>
                                        <div class="footer-right" style="float: right; width: 50%; text-align: right;">
                                                <div class="signature-box">
                                                    <div class="left">
                                                        <div class="label">
                                                            <div>Tanggal</div>
                                                            <div>:</div>
                                                            <div></div>
                                                        </div>
                                                        <div class="label">
                                                            <div>Bulan</div>
                                                            <div>:</div>
                                                            <div></div>
                                                        </div>
                                                        <div class="label">
                                                            <div>Tahun</div>
                                                            <div>:</div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                    <div class="right">
                                                        <div class="label">
                                                            <div>Paraf</div>
                                                            <div>:</div>
                                                            <div></div>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>

                                    </div>
								</div>
							</div>
						</div>
					</div>
			    </div>