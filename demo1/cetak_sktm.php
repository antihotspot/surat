<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lembar disposisi</title>
    <style>
        body {
            /* font-size: 12px; */
            margin: 0;
            padding: 0;
        }
        .line {
            border-bottom: 1px solid black;
            height: 15px;
            margin: 2px -15px;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            width: 96.5%;
        }
        .footer-left, .footer-right {
            width: 45%;
        }
        .signature-box {
            border: 1px solid black;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            height: 42px;
        }
        .signature-box .left,
        .signature-box .right {
            width: 30%;
        }
        .signature-box .right {
            border-left: 1px solid black;
            height: 42px;
            width: 100px;
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
        hr.print-visible {
            display: block;
            margin: 2px;
            color: black;
            height: 0.5px;
            background-color: black;
            /* border: none; */
        }
        @media print {
            body {
                margin: 0;
                padding: 0;
                font-size: 10px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            td {
                padding: 2px;
            }
        }
    </style>
</head>
<body>
<?php include '../konek.php';?>
<?php
    if(isset($_GET['id_disposisi'])){
        $id=$_GET['id_disposisi'];
        $sql = "SELECT * FROM lembar_disposisi natural join data_user WHERE id_disposisi='$id'";
        $query = mysqli_query($konek,$sql);
        $data = mysqli_fetch_array($query,MYSQLI_BOTH);
        $dari = $data['dari'];
        $no_agenda = $data['no_agenda'];
        $no_surat = $data['no_surat'];
        $tgl = $data['tanggal_lahir'];
        $tgl2 = $data['tanggal_request'];;
        $tanggal_surat=$data['tanggal_surat'];
        $format = date('d F Y', strtotime($tanggal_surat));
        $jam_diterima=$data['jam_diterima'];
        $perihal=$data['perihal'];
        $tanggal_masuk=$data['tanggal_masuk'];
        $format2 = date('d F Y', strtotime($tanggal_masuk));
        $request = $data['request'];
        $keperluan = $data['keperluan'];
        $acc = $data['acc'];
        $format4 = date('d F Y', strtotime($acc));
        $catatan = $data['catatan']; // Ambil catatan dari database
        $catatan_baris = explode("\n", $catatan); // Pisahkan catatan menjadi baris-baris
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table border="0" align="center" style="width: 100%;">
                    <tr><td></td></tr>
                    <tr><td></td></tr>
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
                    <tr>
                        <td style="text-align:left;">Nomor Surat</td>
                        <td>:</td>
                        <td style="text-align:left;"><?php echo $no_surat; ?></td>
                        <td colspan="3"></td>
                    </tr>
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
                    <tr>
                        <td style="text-align:left;">Jam Diterima</td>
                        <td>:</td>
                        <td style="text-align:left;"><?php echo $jam_diterima; ?></td>
                        <td colspan="3"></td>
                    </tr>
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
                    <tr>
                        <td style="text-align:left;">Tanggal Masuk</td>
                        <td>:</td>
                        <td style="text-align:left;"><?php echo $format2; ?></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                </table>
                <hr class="print-visible">
                <hr class="print-visible">
                
                <table style="width: 100%;">
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <!-- Baris 1 -->
                    <tr>
                        <td style="width: 4%;">Yth.</td>
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
<script>
    window.print();
</script>
</body>
</html>