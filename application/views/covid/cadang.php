<div class="modal fade" id="modal_odp">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"></h4>
					</div>
					<form action="" id="form_odp" class="form-horizontal" method="post"
						enctype="multipart/form-data">
						<div class="modal-body">
							<input type="hidden" id="id_daftar_pasien" name="id_daftar_pasien" />
							<!-- <input type="hidden" id="kd_unik" name="kd_unik" /> -->

							<div class="form-row">
								<div class="col">
                                <label class="control-label col-md">Pemeriksaan DL</label>
									<select name="pem_dl" id="pem_dl" class="form-control">
										<option value="">--Select--</option>
										<option value="Y"> Iya</option>
										<option value="T"> Tidak </option>										
									</select>
								</div>
								<div class="col">
                                <label class="control-label col-md">Pemeriksaan Petugas Thorax</label>
									<select name="pem_petugas_thorax" id="pem_petugas_thorax" class="form-control">
										<option value="">--Select--</option>
										<option value="Y"> Iya</option>
										<option value="T"> Tidak </option>										
									</select>
								</div>
							</div>
					</form>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" id="btnSave_odp" onclick="save_odp()"
						class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div> <!-- /.modal-content -->
		</div> <!-- /.modal-dialog -->
	</div>
	</div>
	</div> <!-- /.modal -->

	<div class="modal fade" id="modal_odpranap">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"></h4>
					</div>
					<form action="" id="form_odpranap" class="form-horizontal" method="post"
						enctype="multipart/form-data">
						<div class="modal-body">
							<input type="hidden" id="id_daftar_pasien" name="id_daftar_pasien" />
							<!-- <input type="hidden" id="kd_unik" name="kd_unik" /> -->

							<div class="form-row">
                                <label class="control-label col-md-6">DPJP</label>
								<div class="col-md-12">
									<textarea type="text" class="form-control" id="dpjp"
										name="dpjp"> </textarea>
									<span class="help-block"></span>
								</div>
							</div>

                            <div class="form-row">
								<div class="col">
									<label class="control-label col-md">DL</label>
									<select name="dl" id="dl" class="form-control">
										<option value="">--Select--</option>
										<option value="Y"> Iya</option>
										<option value="T"> Tidak </option>
									</select>
								</div>
                                <div class="col">
									<label class="control-label col-md">Rontgen Thorax</label>
									<select name="rontgen_thorax" id="rontgen_thorax" class="form-control">
										<option value="">--Select--</option>
										<option value="Y"> Iya</option>
										<option value="T"> Tidak </option>
									</select>
								</div>
							</div>

                            <div class="form-row">
								<div class="col">
									<label class="control-label col-md">Rapid Tes 1</label>
									<select name="rapid_tes_1" id="rapid_tes_1" class="form-control">
										<option value="">--Select--</option>
										<option value="Y"> Iya</option>
										<option value="T"> Tidak </option>
									</select>
								</div>
                                <div class="col">
                                        <label class="control-label col-md">Tanggal Rapid Tes 1</label>
                                        <input type="date" class="form-control" id="tgl_rapid_tes_1" name="tgl_rapid_tes_1">
								</div>
                                <div class="col">
                                        <label class="control-label col-md">Hasil Rapid Tes 1</label>
                                        <input type="text" class="form-control" id="hasil_rapid_tes1" name="hasil_rapid_tes1">
								</div>
							</div>
                
							<div class="form-row">
								<div class="col">
									<label class="control-label col-md">Perubahan Status Covid</label>
									<select name="per_status_covid" id="per_status_covid" class="form-control">
										<option value="">--Select--</option>
										<option value="Y"> Iya</option>
										<option value="T"> Tidak </option>
									</select>
								</div>
								<div class="col">
                                    <label class="control-label col-md">Menjadi</label>
                                    <input type="text" class="form-control" id="hasil_per_status" name="hasil_per_status">
								</div>
							</div>

							<div class="form-row">
							<label class="control-label col-md-6">Diagnosa Akhir</label>
								<div class="col-md-12">
									<textarea type="text" class="form-control" id="diagnosa_akhir"
										name="diagnosa_akhir"> </textarea>
									<span class="help-block"></span>
								</div>
							</div>

							<div class="form-row">
								<div class="col">
                                    <label class="control-label col-md">Tanggal KRS</label>
                                    <input type="date" class="form-control" id="tgl_krs" name="tgl_krs">
								</div>
								<div class="col">
								<label class="control-label col-md">Kondisi KRS</label>
									<select name="kondisi_krs" id="kondisi_krs" class="form-control">
										<option value="">--Select--</option>
										<option value="Rujuk"> Rujuk </option>
										<option value="Meninggal"> Meninggal </option>
										<option value="Lanjut Isolasi Mandiri"> Lanjut Isolasi Mandiri </option>
									</select>
								</div>
							</div>
					</form>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" id="btnSave_odpranap" onclick="save_odpranap()" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div> <!-- /.modal-content -->
		</div> <!-- /.modal-dialog -->
	</div>
	</div>
	</div> <!-- /.modal -->