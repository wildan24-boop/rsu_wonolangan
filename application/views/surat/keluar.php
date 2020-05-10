<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title m-0 font-weight-bold text-white"><?= $title; ?></h3>
			<div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fas fa-minus"></i></button>
				<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
					<i class="fas fa-times"></i></button>
			</div>
		</div>
		<div class="card-body">
			<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash112'); ?>"></div>
			<?php if ($this->session->flashdata('flash112')) : ?>
			<?php endif; ?>
			<?php if($this->session->userdata('role_id') == '1'){  ?>
			<button class="btn btn-primary" onclick="add_keluar()"><i class="glyphicon glyphicon-plus"></i> Add Surat
				Keluar</button>
			<?php }else{ ?>
			<?php if($this->session->userdata('role_id') == '3'){  ?>
			<button class="btn btn-primary" onclick="add_keluar()"><i class="glyphicon glyphicon-plus"></i> Add Surat
				Keluar</button>
			<?php }}?>
			<button class="btn btn-default" onclick="reload_table_keluar()"> Reload <i class="fas fa-retweet"></i></button>
			<div class="table-responsive mt-3">
				<table id="table_keluar" class="table display responsive nowrap" width="100%">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col"><i class="fas fa-binoculars"></i></th>
							<?php if($this->session->userdata('role_id') == '1'){  ?>
							<!-- Admin = Edit, Hapus, Arsip -->
							<th scope="col"><i class="fas fa-users-cog"></i></th>
							<?php } ?>
							<th scope="col">Nomor</th>
							<th scope="col">Tanggal Surat</th>
							<th scope="col">Kepada</th>
							<th scope="col">Perihal</th>
							<th scope="col">Ttd</th>
							<th scope="col">Tanggal Kirim</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table> <!-- END ISI  -->
			</div> <!-- /.card-body -->
		</div> <!-- /.card -->

		<div class="modal fade" id="modal_keluar">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"></h4>
					</div>
					<form action="" id="form_keluar" class="form-horizontal" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<input type="hidden" id="id_sur_keluar" name="id_sur_keluar" />
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
							</div>

							<div class="form-row">
								<div class="col">
									<label class="control-label col-md-6">Pembuat</label>
                  						<select name="pembuat" id="pembuat" class="form-control">
										<option value="">--Select Pembuat--</option>
										<?php foreach($karyawan as $cl) : ?>
										<option value="<?= $cl['nama_pegawai'] ?>"> <?= $cl['nama_pegawai'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="col">
									<label class="control-label col-md-6">Status Surat</label>
									<input type="text" class="form-control" id="status_surat" name="status_surat">
								</div>
							</div>

							<div class="form-row mt-3">
								<div class="col">
									<label class="control-label col-md-6">Jenis Surat</label>
									<input type="text" class="form-control" id="jenis_surat" name="jenis_surat">
								</div>
								<div class="col">
									<label class="control-label col-md-6">Kepada</label>
									<select name="kepada" id="kepada" class="form-control">
										<option value="">--Select Tujuan--</option>
										<?php foreach($client as $cl) : ?>
										<option value="<?= $cl['nm_persero'] ?>"> <?= $cl['nm_persero'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

							<div class="form-group mt-3">
								<label class="control-label col-md-6">Perihal</label>
								<div class="col-md-12">
									<textarea type="text" class="form-control" id="perihal_surat" name="perihal_surat"> </textarea>
									<span class="help-block"></span>
								</div>
							</div>

							<div class="form-row mt-3">
              <div class="col">
									<label class="control-label col-md-6">Paraf</label>
									<select name="control" id="control" class="form-control">
										<option value="">--Select Paraf--</option>
										<option value="5"> Kepala Bagian AKU </option>
										<option value="6"> Kepala Bagian Pelayanan</option>
									</select>
								</div>
								<div class="col">
									<label class="control-label col-md-6">File Upload</label>
									<input type="file" id="upload_doc" name="upload_doc">
								</div>
							</div>
					</form>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" id="btnSave_keluar" onclick="save_keluar()" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div> <!-- /.modal-content -->
		</div> <!-- /.modal-dialog -->
	</div>
	</div>
	</div> <!-- /.modal -->
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
