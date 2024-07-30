<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="fw-bold text-uppercase">TAMPIL ACC REQUEST LEMBAR DISPOSISI</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="table-responsive">
                            <table id="add1" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Dari</th>
                                        <th>No Agenda</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Jam Diterima</th>
                                        <th>Perihal</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Catatan</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM lembar_disposisi NATURAL JOIN data_user WHERE status=0";
                                        $query = mysqli_query($konek, $sql);
                                        while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                            $id_request_disposisi = $data['id_request_disposisi'];
                                            $dari = $data['dari'];
                                            $no_agenda = $data['no_agenda'];
                                            $no_surat = $data['nomor_surat'];
                                            $tanggal_surat = $data['tanggal_surat'];
                                            $jam_diterima = $data['jam_diterima'];
                                            $perihal = $data['perihal'];
                                            $tanggal_masuk = $data['tanggal_masuk'];
                                            $catatan = $data['catatan'];
                                            $status = $data['status'];

                                            if ($status == "1") {
                                                $status = "<b style='color:blue'>ACC</b>";
                                            } elseif ($status == "0") {
                                                $status = "<b style='color:red'>BELUM ACC</b>";
                                            }
                                    ?>
                                    <tr>
                                        <td><?php echo $dari; ?></td>
                                        <td><?php echo $no_agenda; ?></td>
                                        <td><?php echo $no_surat; ?></td>
                                        <td><?php echo $tanggal_surat; ?></td>
                                        <td><?php echo $jam_diterima; ?></td>
                                        <td><?php echo $perihal; ?></td>
                                        <td><?php echo $tanggal_masuk; ?></td>
                                        <td><?php echo $catatan; ?></td>
                                        <td>
                                            <input type="checkbox" name="check[]" value="<?php echo $id_request_disposisi; ?>">
                                            <input type="submit" name="acc" class="btn btn-primary btn-sm" value="ACC">
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cek Data" href="?halaman=detail_sktm&id_request_disposisi=<?= $id_request_disposisi; ?>">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['acc'])) {
    if (isset($_POST['check'])) {
        foreach ($_POST['check'] as $value) {
            $ubah = "UPDATE lembar_disposisi SET status=1 WHERE id_request_disposisi = $value";
            $query = mysqli_query($konek, $ubah);

            if ($query) {
                echo "<script language='javascript'>swal('Selamat...', 'ACC Berhasil!', 'success');</script>";
                echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_sktm">';
            } else {
                echo "<script language='javascript'>swal('Gagal...', 'ACC Gagal!', 'error');</script>";
                echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_sktm">';
            }
        }
    }
}
?>
