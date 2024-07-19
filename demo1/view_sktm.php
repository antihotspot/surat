<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
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
                    <tr>
                        <td style="text-align:left;">Nomor Surat</td>
                        <td>:</td>
                        <td style="text-align:left;"><?php echo $nomor_surat; ?></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td style="text-align:left;">Tanggal Surat</td>
                        <td>:</td>
                        <td style="text-align:left;"><?php echo $tanggal_surat; ?></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td style="text-align:left;">Jam Diterima</td>
                        <td>:</td>
                        <td style="text-align:left;"><?php echo $jam_diterima; ?></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td style="text-align:left;">Perihal</td>
                        <td>:</td>
                        <td style="text-align:left;"><?php echo $perihal; ?></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td style="text-align:left;">Tanggal Masuk</td>
                        <td>:</td>
                        <td style="text-align:left;"><?php echo $tanggal_masuk; ?></td>
                        <td colspan="3"></td>
                    </tr>
                </table>
                                    </table>
                                    <br>
                                    <table border="0" align="center">
                                        <tr>
                                            <td>
                                                <center>
                                                    <font size="4"><b>SURAT KETERANGAN / PENGANTAR</b></font><br>
                                                    <hr style="margin:0px" color="black">
                                                    <span>Nomor : 045.2 / <?php echo $id;?> / 29.07.05</span>
                                                </center>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <br>
                                    <table border="0" align="center">
                                        <tr>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini Lurah Wergu Wetan Kabupaten Kota <br> Kudus, Menerangkan bahwa :
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table border="0" align="center">
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><?php echo $nama;?></td>
                                        </tr>
                                        <tr>
                                            <td>TTL</td>
                                            <td>:</td>
                                            <td><?php echo $tempat.", ".$format1;?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td><?php echo $jekel;?></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:</td>
                                            <td><?php echo $agama;?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Warga</td>
                                            <td>:</td>
                                            <td><?php echo $status_warga;?></td>
                                        </tr>
                                        <tr>
                                            <td>No. NIK</td>
                                            <td>:</td>
                                            <td><?php echo $nik;?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?php echo $alamat;?></td>
                                        </tr>
                                        <tr>
                                            <td>Keperluan</td>
                                            <td>:</td>
                                            <td><?php echo $keperluan;?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <?php 
                                                
                                                if($request=="TIDAK MAMPU"){
                                                    $request="Surat Keterangan Tidak Mampu";
                                                }
                                            
                                            ?>
                                            <td><?php echo $request;?></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table border="0" align="center">
                                        <tr>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat ini diberikan kepada yang bersangkutan agar dapat dipergunakan<br>&nbsp;&nbsp;&nbsp;&nbsp;untuk sebagaimana mestinya.
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
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