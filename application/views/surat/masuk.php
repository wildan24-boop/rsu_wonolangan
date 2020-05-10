<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title m-0 font-weight-bold text-white"><?= $title; ?></h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
					title="Collapse">
					<i class="fas fa-minus"></i></button>
				<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
					title="Remove">
					<i class="fas fa-times"></i></button>
			</div>
		</div>
		<div class="card-body">
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash11'); ?>"></div>
			<?php if ($this->session->flashdata('flash11')) : ?>
			<?php endif; ?>
			<?php if($this->session->userdata('role_id') == '1'){  ?>
			<button class="btn btn-primary" onclick="add_masuk()"><i class="glyphicon glyphicon-plus"></i> Add Surat
				Masuk</button>
			<?php }else{ ?>
			<?php if($this->session->userdata('role_id') == '3'){  ?>
			<button class="btn btn-primary" onclick="add_masuk()"><i class="glyphicon glyphicon-plus"></i> Add Surat
				Masuk</button>
			<?php }}?>
			<button class="btn btn-default" onclick="reload_table_masuk()"> Reload <i
					class="fas fa-retweet"></i></button>
			<div class="table-responsive mt-3">
				<table id="table_masuk" class="table display responsive nowrap" width="100%">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col"><i class="fas fa-binoculars"></i></th>
							<?php if($this->session->userdata('role_id') == '1'){  ?> <!-- Admin = Edit, Hapus, Arsip -->
							<th scope="col"><i class="fas fa-users-cog"></i></th>
							<?php } ?>					
							<?php if($this->session->userdata('role_id') == '2'){  ?> <!-- Kepala RS = Disposisi -->
							<th scope="col"><i class="fas fa-clipboard-check"></i></th>
							<?php } ?>
							<?php if($this->session->userdata('role_id') == '5'){  ?> <!-- Kabag AKU = Paraf -->
							<th scope="col"><i class="fas fa-clipboard-check"></i></th>
							<?php } ?>
							<?php if($this->session->userdata('role_id') == '6'){  ?> <!-- Kabag Yan = Paraf -->
							<th scope="col"><i class="fas fa-clipboard-check"></i></th>
							<?php } ?>
							<?php if($this->session->userdata('role_id') == '4'){  ?> <!-- Karyawan = Pro diterima -->
							<th scope="col"><i class="fas fa-clipboard-check"></i></th>
							<?php } ?>
							<th scope="col">Nomor</th>
							<th scope="col">Tanggal Terima</th>
							<th scope="col">Pengirim</th>
							<th scope="col">Kepada</th>
							<th scope="col">Perihal</th>
							<th scope="col">Pro Disposisi</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table> <!-- END ISI  -->
			</div> <!-- /.card-body -->
		</div> <!-- /.card -->

		<div class="modal fade" id="modal_masuk">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"></h4>
					</div>
					<form action="" id="form_masuk" class="form-horizontal" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<input type="hidden" id="id_sur_masuk" name="id_sur_masuk" />
							<input type="hidden" id="kd_unik" name="kd_unik" />

							<div class="form-row">
								<div class="col">
									<label class="control-label col-md-6">Nomor</label>
									<input type="text" class="form-control" id="no_surat" name="no_surat">
								</div>
								<div class="col">
									<label class="control-label">Tanggal Surat</label>
									<input type="date" class="form-control" id="tgl_surat" name="tgl_surat">
								</div>
								<div class="col">
									<label class="control-label col-md-6">Penerima</label>
									<select name="penerima" id="penerima" class="form-control">
										<option value="">--Select Penerima--</option>
										<option value="Sekretariat"> Sekretariat </option>
									</select>
								</div>
							</div>

							<div class="form-row mt-3">
								<div class="col">
									<label class="control-label col-md-6">Jenis Surat</label>
									<input type="text" class="form-control" id="jenis_surat" name="jenis_surat">
								</div>
								<div class="col">
									<label class="control-label col-md-6">Pengirim</label>
									<select name="sur_dari" id="sur_dari" class="form-control">
										<option value="">--Select Pengirim--</option>
										<?php foreach($client as $cl) : ?>
										<option value="<?= $cl['nm_persero'] ?>"> <?= $cl['nm_persero'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="form-group mt-3">
								<label class="control-label col-md-6">Perihal</label>
								<div class="col-md-12">
									<textarea type="text" class="form-control" id="perihal_surat"
										name="perihal_surat"> </textarea>
									<span class="help-block"></span>
								</div>
							</div>

							<div class="form-group mt-3">
								<label class="control-label col-md-6">Agenda</label>
								<div class="col-md-12">
									<textarea type="text" class="form-control" id="agenda_surat"
										name="agenda_surat"> </textarea>
									<span class="help-block"></span>
								</div>
							</div>

							<div class="form-row mt-3">
								<div class="col">
									<label class="control-label col-md-6">Kepada</label>
									<select name="kepada" id="kepada" class="form-control">
										<option value="">--Select Kepada--</option>
										<option value="Kepala RSUW"> Kepala RSUW</option>
									</select>
								</div>
								<div class="col">
									<label class="control-label col-md-6">Status</label>
									<select name="status" id="status" class="form-control">
										<option value="">--Select Status--</option>
										<option value="Rahasia"> Rahasia </option>
										<option value="Umum"> Umum</option>
									</select>
								</div>
								<div class="col">
									<label class="control-label col-md-6">Paraf</label>
									<select name="control" id="control" class="form-control">
										<option value="">--Select Paraf--</option>
										<option value="5"> Kepala Bagian AKU </option>
										<option value="6"> Kepala Bagian Pelayanan</option>
									</select>
								</div>
							</div>

							<div class="form-row mt-3">
								<div class="col">
									<label class="control-label col-md-6">File Upload</label>
									<input type="file" id="upload_surat" name="upload_surat">
								</div>
							</div>
					</form>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" id="btnSave_masuk" onclick="save_masuk()"
						class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div> <!-- /.modal-content -->
		</div> <!-- /.modal-dialog -->
	</div>
	</div>
	</div> <!-- /.modal -->

	<!-- // modaaal disposisi -->
	<div class="modal fade" id="modal_disposisi" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body form">
					<form action="#" id="form_disposisi" class="form-horizontal">
						<div class="form-body">
							<input type="hidden" value="id_sur_masuk" name="id_sur_masuk" />
							<div class="card">
								<div class="card-header bg-primary">
									<h6 class="m-0 font-weight-bold text-white" align="center"><span> Disposisi</span>
									</h6>
								</div>
								<div class="card-body">
									<div class="form-row">
										<div class="col">
											<label class="control-label col-md-6">Nomor</label>
											<input type="text" class="form-control" id="no_surat" name="no_surat">
										</div>
										<div class="col">
											<label class="control-label">Tanggal Terima</label>
											<input type="date" class="form-control" id="tgl_terima" name="tgl_terima">
										</div>
									</div>
									<div class="form-row">
										<div class="col">
											<label class="control-label col-md-6">Kepala Bagian AKU</label>
											<input type="text" class="form-control" id="ka_bag_aku" name="ka_bag_aku">
										</div>
										<div class="col">
											<label class="control-label">Kepala Bagian Pelayanan</label>
											<input type="text" class="form-control" id="ka_bag_yan" name="ka_bag_yan">
										</div>
									</div>
									<div class="card-body">
										<label class="control-label col-md-6">Disposisi</label>
										<div class="form-row">
											<?php foreach($disposisi as $dis) : ?>
											<div class="col-6">
												<div class="form-group mt-2">
													<div class="custom-control custom-checkbox">
														<input class="minimal-red" type="checkbox" name="id_disposisi[]"
															value="<?= $dis['id'] ?>">
														<?= $dis['type'] ?>
													</div>
												</div>
											</div>
											<?php endforeach ?>
										</div>
									</div>
									<div class="form-row">
										<div class="col">
											<label class="control-label col-md-6">Pro Disposisi</label>
											<select name="pro_disposisi" id="pro_disposisi" class="form-control">
												<option value="">--Select--</option>
												<?php foreach($karyawan as $cl) : ?>
												<option value="<?= $cl['nama_pegawai'] ?>"> <?= $cl['nama_pegawai'] ?>
												</option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
									<div class="form-group mt-3">
										<label class="control-label col-md-6">Catatan</label>
										<div class="col-md-12">
											<textarea type="text" class="form-control" id="catatan_ka_rs"
												name="catatan_ka_rs"> </textarea>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
							</div>
					</form>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" id="btnSave_disposisi" onclick="save_disposisi()"
						class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	</div>

<!-- Modal Paraf Kabag Yan -->
<div class="modal fade" id="modal_kabag_Yan">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" id="form_kabag_Yan" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<input type="hidden" value="id_sur_masuk" id="id_sur_masuk" name="id_sur_masuk" />
						<!-- /.col -->
						<div class="form-row">
							<div class="col">
								<label class="control-label col-md-6">Nomor</label>
								<input type="text" class="form-control" id="no_surat" name="no_surat">
							</div>
							<div class="col">
								<label class="control-label">Tanggal Terima</label>
								<input type="date" class="form-control" id="tgl_terima" name="tgl_terima">
							</div>
						</div>
						<div class="form-row">
							<div class="col">
								<label class="control-label col-md-6">Paraf</label>
								<select name="ka_bag_yan" id="ka_bag_yan" class="form-control">
									<option value="">--Selct Paraf--</option>
									<option value="kabag Pelayanan"> Paraf </option>
								</select>
							</div>
						</div>
						<div class="form-group mt-3">
							<label class="control-label col-md-6">Catatan</label>
							<div class="col-md-12">
								<textarea type="text" class="form-control" id="catatan_surat"
									name="catatan_surat"> </textarea>
								<span class="help-block"></span>
							</div>
						</div>
				</form>
				<div class="modal-footer justify-content-between">
					<button type="button" id="btnSave_kabag_Yan" onclick="save_kabag_Yan()"
						class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	</div>
	<!-- /.modal -->

	<!-- Modal Paraf Kabag AKU -->
	<div class="modal fade" id="modal_kabag_aku">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" id="form_kabag_aku" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<input type="hidden" value="id_sur_masuk" id="id_sur_masuk" name="id_sur_masuk" />
						<!-- /.col -->
						<div class="form-row">
							<div class="col">
								<label class="control-label col-md-6">Nomor</label>
								<input type="text" class="form-control" id="no_surat" name="no_surat">
							</div>
							<div class="col">
								<label class="control-label">Tanggal Terima</label>
								<input type="date" class="form-control" id="tgl_terima" name="tgl_terima">
							</div>
						</div>
						<div class="form-row">
							<div class="col">
								<label class="control-label col-md-6">Paraf</label>
								<select name="ka_bag_aku" id="ka_bag_aku" class="form-control">
									<option value="">--Selct Paraf--</option>
									<option value="kabag AKU"> Paraf </option>
								</select>
							</div>
						</div>
						<div class="form-group mt-3">
							<label class="control-label col-md-6">Catatan</label>
							<div class="col-md-12">
								<textarea type="text" class="form-control" id="catatan_surat"
									name="catatan_surat"> </textarea>
								<span class="help-block"></span>
							</div>
						</div>
				</form>
				<div class="modal-footer justify-content-between">
					<button type="button" id="btnSave_kabag_aku" onclick="save_kabag_aku()"
						class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	</div>
	<!-- /.modal -->

<!-- Modal Disposisi Diterima -->
<div class="modal fade" id="modal_diterima">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" id="form_diterima" class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<input type="hidden" value="id_sur_masuk" id="id_sur_masuk" name="id_sur_masuk" />
						<!-- /.col -->
						<div class="form-row">
							<div class="col">
								<label class="control-label col-md-6">Nomor</label>
								<input type="text" class="form-control" id="no_surat" name="no_surat">
							</div>
							<div class="col">
								<label class="control-label">Tanggal Terima</label>
								<input type="date" class="form-control" id="tgl_terima" name="tgl_terima">
							</div>
						</div>
						<div class="form-row">
							<div class="col">
								<label class="control-label col-md-6">Status Disposisi</label>
								<select name="pro_diterima" id="pro_diterima" class="form-control">
									<option value="">--Selct Status--</option>
									<option value="Diterima"> Diterima </option>
								</select>
							</div>
						</div>
						<div class="form-group mt-3">
							<label class="control-label col-md">Catatan Disposisi</label>
							<div class="col-md-12">
								<textarea type="text" class="form-control" id="catatan_ka_rs"
									name="catatan_ka_rs"> </textarea>
								<span class="help-block"></span>
							</div>
						</div>
				</form>
				<div class="modal-footer justify-content-between">
					<button type="button" id="btnSave_diterima" onclick="save_diterima()"
						class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	</div>
	<!-- /.modal -->

</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
