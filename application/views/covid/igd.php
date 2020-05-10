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
				<button class="btn btn-primary" onclick="add_igd()"><i class="glyphicon glyphicon-plus"></i> TAMBAH PASIEN</button>
			<?php } ?>
			<button class="btn btn-default" onclick="reload_table_igd()"> Reload <i class="fas fa-retweet"></i></button>
			<div class="table-responsive mt-3">
				<table id="table_igd" class="table display responsive nowrap" width="100%">
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
							<th scope="col">Tanggal Pemeriksaan</th>
							<th scope="col">Diagnosa Masuk</th>
							<th scope="col">Komorbid</th>
							<th scope="col">Status Covid Awal</th>
							<th scope="col">Totalaksana</th>

						</tr>
					</thead>
					<tbody></tbody>
				</table> <!-- END ISI  -->
			</div> <!-- /.card-body -->
		</div> <!-- /.card -->
		<div class="modal fade" id="modal_igd">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"></h4>
					</div>
					<form action="" id="form_igd" class="form-horizontal" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<input type="hidden" id="id_daftar_pasien" name="id_daftar_pasien" />
							<!-- <input type="hidden" id="kd_unik" name="kd_unik" /> -->

							<div class="form-row mt-2">
								<div class="col">
									<label class="control-label col-md">Nomor RM</label>
									<select name="no_rm" id="no_rm" class="select2bs4 form-control">
										<option value="">--Select Pasien--</option>
										<?php foreach ($pasien as $cl) : ?>
											<option value="<?= $cl['no_rm'] ?>"> <?= $cl['no_rm'] ?> - <?= $cl['nama_pasien'] ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="col">
									<label class="control-label col-md">Nama Pasien</label>
									<input type="text" class="form-control" id="nama_pasien" name="nama_pasien" readonly>
								</div>
							</div>
							<div class="form-row mt-2">
								<div class="col">
									<label class="control-label col-md">Tanggal Lahir</label>
									<input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" readonly>
								</div>
								<div class="col">
									<label class="control-label col-md">Jenkel</label>
									<input type="text" class="form-control" id="jenkel" name="jenkel" readonly>
								</div>
							</div>

							<div class="form-row mt-2">
								<div class="col">
									<label class="control-label col-md">Umur</label>
									<input type="text" class="form-control" id="umur" name="umur" readonly>
								</div>
								<div class="col">
									<label class="control-label col-md">Tanggal Pemeriksaan</label>
									<input type="date" class="form-control" id="tgl_pemeriksaan" name="tgl_pemeriksaan">
								</div>
							</div>

							<div class="form-row mt-2">
								<label class="control-label col-md-6">Diagnosa Masuk</label>
								<div class="col-md-12">
									<textarea type="text" class="form-control" id="diagnosa_masuk" name="diagnosa_masuk"> </textarea>
									<span class="help-block"></span>
								</div>
							</div>

							<div class="form-row">
								<label class="control-label col-md-6">Komorbid</label>
								<div class="col-md-12">
									<textarea type="text" class="form-control" id="komorbid" name="komorbid"> </textarea>
									<span class="help-block"></span>
								</div>
							</div>

							<div class="form-row mt-2">
								<div class="col">
									<label class="control-label col-md">Status Covid Awal</label>
									<select name="status_covid_awal" id="status_covid_awal" class="form-control">
										<option value="">--Select Status--</option>
										<option value="ODR"> Orang Dalam Resiko ODR</option>
										<option value="OTG"> Orang Tanpa Gejala OTG </option>
										<option value="ODP"> Orang Dalam Pemantauan ODP </option>
										<option value="PDP"> Pasien Dalam Pengawasan </option>
										<option value="Konfirmasi"> Konfirmasi </option>
									</select>
								</div>
								<div class="col">
									<label class="control-label col-md">Totalaksana</label>
									<select onchange="ganti()" name="totalaksana" id="totalaksana" class="form-control">
										<option value="">--Select --</option>
										<option value="Rawat Jalan Pulang"> Rawat Jalan Pulang</option>
										<option value="Rujuk"> Rujuk </option>
										<option value="Meninggal"> Meninggal </option>
										<option value="Rawat Inap"> Rawat Inap </option>
									</select>
								</div>
							</div>

							<div class="form-row mt-2">
								<div class="col" id="form_rjp">
									<label class="control-label col-md">Rawat Jalan Pulang</label>
									<input type="date" class="form-control" id="tgl_rjp" name="tgl_rjp">
								</div>
								<div class="col" id="form_rujuk">
									<label class="control-label">Rujuk RS</label>
									<select name="rujuk_rs" id="rujuk_rs" class="form-control">
										<option value="">--Select --</option>
										<option value="Rumah Sakit 1"> Rumah Sakit 1</option>
										<option value="Rumah Sakit 2"> Rumah Sakit 2</option>
										<option value="Rumah Sakit 3"> Rumah Sakit 3</option>
										<option value="Rumah Sakit 4"> Rumah Sakit 4</option>
									</select>
								</div>
								<div class="col" id="form_meninggal">
									<label class="control-label col-md">Waktu Meninggal</label>
									<input type="datetime-local" class="form-control" id="meninggal_waktu" name="meninggal_waktu">
								</div>
								<div class="col" id="form_RI">
									<label class="control-label col-md">Ruang Inap</label>
									<select name="rawat_inap_ruang" id="rawat_inap_ruang" class="form-control">
										<option value="">--Select --</option>
										<option value="Ruang 1"> Ruang 1</option>
										<option value="Ruang 2"> Ruang 2</option>
										<option value="Ruang 3"> Ruang 3</option>
										<option value="Ruang 4"> Ruang 4</option>
									</select>
								</div>
							</div>
							<div class="form-row mt-2">
								<div class="col">
									<label class="control-label col-md"></label>
									<input type="hidden" class="form-control" id="" name="">
								</div>
								<div class="col">
									<label class="control-label col-md"></label>
									<input type="hidden" class="form-control" id="" name="">
								</div>
<<<<<<< HEAD

=======
							</div>
							<div class="form-row mt-2">
								<div class="col">
									<label class="control-label col-md"></label>
									<input type="hidden" class="form-control" id="" name="">
								</div>
								<div class="col">
									<label class="control-label col-md">Status</label>
									<select name="control" id="control" class="form-control">
										<option value="">--Select Status--</option>
										<option value="1"> ODR / OTG</option>
										<option value="2"> ODP Rajal </option>
										<option value="3"> ODP Ranap </option>
										<option value="4"> PDP Rajal </option>
										<option value="5"> PDP Ranap </option>
										<option value="6"> konfirmasi </option>
										<option value="7"> Non Covid </option>
										<option value="8"> Rujuk </option>
										<option value="9"> Meninggal </option>
										<option value="10"> Isolasi Mandiri </option>
										<option value="11"> Instalasi Gawat Darurat </option>
									</select>
								</div>
>>>>>>> 085f1918e701157c8b7c3f67eec3358a02046e72
							</div>
					</form>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" id="btnSave_igd" onclick="save_igd()" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div> <!-- /.modal-content -->
		</div> <!-- /.modal-dialog -->
	</div>
	</div>
	</div> <!-- /.modal -->

</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<script>
	function ganti() {
		var total_laksana = $("#totalaksana").val();

		if (total_laksana == 1) {
			$("#form_rujuk").hide();
			$("#form_rujuk").hide();
		}
	}
</script>