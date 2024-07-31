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
										<h4 class="fw-bold text-uppercase">belum acc request surat keterangan tidak mampu</h4>
									</div>
								</div>
								<div class="card-body">
									<form action="" method="POST">
										<div class="table-responsive">
											<table id="add1" class="display table table-striped table-hover" >
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
										<th>Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
												</thead>
												<tbody>
													<?php
														$sql = "SELECT * FROM lembar_disposisi natural join data_user WHERE status=1";
														$query = mysqli_query($konek,$sql);
														while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
															$id_disposisi=$data['id_disposisi'];
														$dari = $data['dari'];
														$no_agenda = $data['no_agenda'];
														$no_surat = $data['no_surat'];
														$tanggal_surat = $data['tanggal_surat'];
														$format = date('d F Y', strtotime($tanggal_surat));
														$jam_diterima = $data['jam_diterima'];
														$jam = date('H:i:s', strtotime($jam_diterima));
                                                        $perihal = $data['perihal'];
                                                        $tanggal_masuk = $data['tanggal_masuk'];
														$format2 = date('d F Y', strtotime($tanggal_masuk));
														$catatan = $data['catatan'];
														$status = $data['status'];
															
	
															if($status=="1"){
																$status = "Sudah ACC Staf";
															}elseif($status=="0"){
																$status = "BELUM ACC";
															}
													?>
													<tr>
														</td>
														<td><?php echo $dari;?></td>
												<td><?php echo $no_agenda;?></td>
												<td><?php echo $no_surat;?></td>
													<td><?php echo $format;?></td>
                                                    <td><?php echo $jam;?></td>
                                                    <td><?php echo $perihal;?></td>
													<td><?php echo $format2;?></td>
													<td><?php echo $catatan;?></td>
													<td><?php echo $status;?></td>
														
														<td>
															<div class="form-button-action">
																<a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Surat" href="?halaman=view_sktm&id_disposisi=<?= $id_disposisi;?>">
																<i class="fa fa-edit"></i></a>
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