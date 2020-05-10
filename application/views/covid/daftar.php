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
			<?php if ($this->session->userdata('role_id') == '1') {  ?>
				<!-- ISI -->
				<button class="btn btn-primary" onclick="add_daftar()"><i class="glyphicon glyphicon-plus"></i> TAMBAH PASIEN</button>
			<?php } ?>
			<button class="btn btn-default" onclick="reload_table_daftar()"> Reload <i class="fas fa-retweet"></i></button>
			<button class="btn btn-success" onclick="export_excel()"> Excel </button>
			<div class="table-responsive mt-3">
				<table id="table_daftar" class="table display responsive nowrap" width="100%">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col"><i class="fas fa-binoculars"></i></th>
							<th scope="col"><i class="fas fa-users-cog"></i></th>
							<th scope="col">No RM</th>
							<th scope="col">Nama Pasien</th>
							<th scope="col">Tanggal Lahir</th>
							<th scope="col">Umur</th>
							<th scope="col">Jenkel</th>
							<th scope="col">Jaminan</th>
							<th scope="col">Kecamatan</th>
							<th scope="col">Kab / Kota Probolinggo</th>
							<th scope="col">Kota lain</th>

						</tr>
					</thead>
					<tbody></tbody>
				</table> <!-- END ISI  -->
			</div> <!-- /.card-body -->
		</div> <!-- /.card -->
		<div class="modal fade" id="modal_daftar">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"></h4>
					</div>
					<form action="" id="form_daftar" class="form-horizontal" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<input type="hidden" id="id_pasien" name="id_pasien" />
							<!-- <input type="hidden" id="kd_unik" name="kd_unik" /> -->

							<div class="form-row mt-3">
								<div class="col">
									<label class="control-label col-md">Nomor RM</label>
									<input type="number" class="form-control" id="no_rm" name="no_rm">
								</div>
								<div class="col">
									<label class="control-label">Nama Pasien</label>
									<input type="text" class="form-control" id="nama_pasien" name="nama_pasien">
								</div>
							</div>

							<div class="form-row mt-3">
								<div class="col">
									<label class="control-label col-md">Tanggal Lahir</label>
									<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
								</div>
								<div class="col">
									<label class="control-label col-md">Jenis Kelamin</label>
									<select name="jenkel" id="jenkel" class="form-control">
										<option value="">--Select Jenkel--</option>
										<option value="Laki-laki"> Laki - laki</option>
										<option value="Perempuan"> Perempuan </option>
									</select>
								</div>
							</div>

							<div class="form-row mt-3">
								<div class="col-md-6">
									<label class="control-label">Jaminan</label>
									<select onchange="bpjs()" name="jaminan" id="jaminan" class="form-control">
										<option value="">--Select Jaminan--</option>
										<option value="BPJS"> BPJS</option>
										<option value="SWASTA"> SWASTA </option>
									</select>
								</div>

								<div class="col" id="form_bpjs">
									<label class="control-label ">No BPJS</label>
									<input type="number" class="form-control" id="no_bpjs" name="no_bpjs">
								</div>

							</div>

							<div class="form-row mt-3">
								<label class="control-label col-md-6">Alamat Lengkap</label>
								<div class="col-md-12">
									<textarea type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap"> </textarea>
									<span class="help-block"></span>
								</div>
							</div>

							<div class="form-row mt-3">
								<div class="col">
									<label class="control-label col-md">kab / kota Probolinggo</label>
									<select name="kab_kota" id="kab_kota" class="form-control">
                                    <option value="">--Select Kab / Kota--</option>
										<?php foreach($kota as $cl) : ?>
										<option idprob="<?= $cl['id_prob'];?>" value="<?= $cl['dom_prob'] ?>"> <?= $cl['dom_prob'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="col">
									<label class="control-label col-md">Kecamatan</label>
									<select name="kecamatan" id="kecamatan" class="form-control">
										<option value="">--Select Kecamatan--</option>
										<?php foreach ($kecamatan as $cl) : ?>
											<option value="<?= $cl['nama_kecamatan'] ?>"> <?= $cl['nama_kecamatan'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="col">
									<label class="control-label">Kota Lain</label>
									<input type="text" class="form-control" id="kota_lain" name="kota_lain">
								</div>
							</div>
					</form>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" id="btnSave_daftar" onclick="save_daftar()" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div> <!-- /.modal-content -->
		</div> <!-- /.modal-dialog -->
	</div>
	</div>
	</div> <!-- /.modal -->

</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<!-- <script>
        alert("Selamat datang di tutorial Javascript");
    </script> -->

<script>
	function bpjs() {

		var ja_minan = $("#jaminan").val();

		if (ja_minan == "BPJS") {
			$("#form_bpjs").show();
		} else {
			$("#form_bpjs").hide();
		}

	}
</script>