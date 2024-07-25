<?php include '../konek.php';?>
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
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            height: 100px;
        }
        .signature-box .left,
        .signature-box .right {
            width: 45%;
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
	if(isset($_GET['id_request_sktm'])){
		$id=$_GET['id_request_sktm'];
		$sql = "SELECT * FROM data_request_sktm natural join data_user WHERE id_request_sktm='$id'";
		$query = mysqli_query($konek,$sql);
        $data = mysqli_fetch_array($query,MYSQLI_BOTH);
        $id=$data['id_request_sktm'];
        $nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat_lahir'];
        $tgl = $data['tanggal_lahir'];
        $tgl2 = $data['tanggal_request'];
        $format1 = date('Y', strtotime($tgl2));
        $format2 = date('d-m-Y', strtotime($tgl));
        $format3 = date('d F Y', strtotime($tgl2));
		$agama = $data['agama'];
		$jekel = $data['jekel'];
		$nama = $data['nama'];
		$alamat = $data['alamat'];
        $status_warga = $data['status_warga'];
        $keperluan = $data['keperluan'];
        $request = $data['request'];
        $acc = $data['acc'];
        $format4 = date('d F Y', strtotime($acc));
        if($acc==0){
            $acc="BELUM TTD";
        }elseif($acc==1){
           $acc;
        }
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
                                                <input type="date" name="tgl_acc" class="form-control">
                                                <div class="form-group">
                                                    <input type="submit" name="ttd" value="ACC" class="btn btn-primary btn-sm">
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['ttd'])){
                                            $ket="Surat sedang dalam proses cetak";
                                            $tgl = $_POST['tgl_acc'];
                                            $update = mysqli_query($konek,"UPDATE data_request_sktm SET acc='$tgl', status=2, keterangan='$ket' WHERE id_request_sktm=$id");
                                            if($update){
                                                echo "<script language='javascript'>swal('Selamat...', 'ACC Lurah Berhasil', 'success');</script>" ;
                                                echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_sktm">';
                                            }else{
                                                echo "<script language='javascript'>swal('Gagal...', 'ACC Lurah Gagal', 'error');</script>" ;
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
                                            <td style="text-align:left; width: 20%;">Dari</td>
                                            <td style="width: 5%;">:</td>
                                            <td style="text-align:left; width: 25%;"><?php echo $dari; ?></td>
                                            <td style="text-align:right; width: 25%;">No. Agenda</td>
                                            <td style="width: 5%;">:</td>
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
                                            <td style="text-align:left;"><?php echo $tanggal_surat; ?></td>
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
                                            <td style="text-align:left;"><?php echo $tanggal_masuk; ?></td>
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
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

        <div class="footer">
            <div class="footer-left">
                <p>Terima kasih,</p>
                <p style="margin-top: 50px;">___________________</p>
            </div>
            <div class="footer-right">
                <div class="signature-box">
                    <div class="left">
                        <div class="label">
                            <div>Tanggal:</div>
                        </div>
                        <div class="label">
                            <div>Bulan:</div>
                        </div>
                        <div class="label">
                            <div>Tahun:</div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="label">
                            <div>Paraf:</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

                                    <br>
                                    <table border="0" align="center">
                                        <tr>
                                            <th></th>
                                            <th width="100px"></th>
                                            <th>Kudus, <?php echo $acc;?></th>
                                        </tr>
                                        <tr>
                                            <td>Tanda tangan <br> Yang bersangkutan </td>
                                            <td></td>
                                            <td>Lurah Wergu Wetan</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="15"></td>
                                            <td></td>
                                            <td rowspan="15"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr><tr>
                                            <td></td>
                                        </tr><tr>
                                            <td></td>
                                        </tr><tr>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><b style="text-transform:uppercase"><u>(<?php echo $nama;?>)</u></b></td>
                                            <td></td>
                                            <td><b><u>(AGUS SUPRIYANTO)</u></b></td>
                                        </tr>
                                    </table>
                                
                                </table>

								</div>
							</div>
						</div>
					</div>
			</div>