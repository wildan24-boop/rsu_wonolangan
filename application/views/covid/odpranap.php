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
			<button class="btn btn-default" onclick="reload_table_odpranap()"> Reload <i
					class="fas fa-retweet"></i></button>
			<div class="table-responsive mt-3">
				<table id="table_odpranap" class="table display responsive nowrap" width="100%">
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

							<div class="form-row mt-2">
                                <label class="control-label col-md-6">DPJP</label>
								<div class="col-md-12">
									<textarea type="text" class="form-control" id="odpnap_dpjp"
										name="odpnap_dpjp"> </textarea>
									<span class="help-block"></span>
								</div>
							</div>

                            <div class="form-row mt-2">
								<div class="col">
									<label class="control-label col-md">DL</label>
									<select name="odpnap_dl" id="odpnap_dl" class="form-control">
										<option value="">--Select--</option>
										<option value="Ya"> Iya</option>
										<option value="Tidak"> Tidak </option>
									</select>
								</div>
                                <div class="col">
									<label class="control-label col-md">Rontgen Thorax</label>
									<select name="odpnap_ront_thorax" id="odpnap_ront_thorax" class="form-control">
										<option value="">--Select--</option>
										<option value="Ya"> Iya</option>
										<option value="Tidak"> Tidak </option>
									</select>
								</div>
							</div>

                            <div class="form-row mt-2">
								<div class="col">
									<label class="control-label col-md">Rapid Tes 1</label>
									<select name="odpnap_rapid_tes1" id="odpnap_rapid_tes1" class="form-control">
										<option value="">--Select--</option>
										<option value="Y"> Iya</option>
										<option value="T"> Tidak </option>
									</select>
								</div>
                                <div class="col">
                                        <label class="control-label col-md">Tanggal Rapid Tes 1</label>
                                        <input type="date" class="form-control" id="odpnap_tgl_rapid_tes1" name="odpnap_tgl_rapid_tes1">
								</div>
                                <div class="col">
                                        <label class="control-label col-md">Hasil Rapid Tes 1</label>
                                        <input type="text" class="form-control" id="odpnap_hasil_rapid_tes1" name="odpnap_hasil_rapid_tes1">
								</div>
							</div>
                
							<div class="form-row mt-2">
								<div class="col">
									<label class="control-label col-md">Perubahan Status Covid</label>
									<select name="odpnap_status_covid" id="odpnap_status_covid" class="form-control">
										<option value="">--Select Status--</option>
										<option value="ODR"> Orang Dalam Resiko ODR</option>
										<option value="OTG"> Orang Tanpa Gejala OTG </option>										
										<option value="ODP"> Orang Dalam Pemantauan ODP </option>										
										<option value="PDP"> Pasien Dalam Pengawasan PDP</option>										
										<option value="Konfirmasi"> Konfirmasi </option>	
									</select>
								</div>
								<div class="col">
                                    <label class="control-label col-md">Menjadi</label>
                                    <select name="odpnap_hasil_status" id="odpnap_hasil_status" class="form-control">
									<option value="">--Select Status--</option>
									<option value="Rajal"> Rawat Jalan</option>
									<option value="Ranap"> Rawat Inap </option>
									</select>
								</div>
								<div class="col">
                                    <label class="control-label col-md">Diagnosa_akhir</label>
                                    <input type="text" class="form-control" id="odpnap_diagnosa_akhir" name="odpnap_diagnosa_akhir">
								</div>
							</div>

							<div class="form-row mt-2">
								<div class="col">
									<label class="control-label col-md">Tanggal KRS</label>
                                    <input type="date" class="form-control" id="odpnap_tgl_krs" name="odpnap_tgl_krs">
								</div>
								<div class="col">
                                    <label class="control-label col-md">Kondisi KRS</label>
										<select name="odpnap_kondisi_krs" id="odpnap_kondisi_krs" class="form-control">
										<option value="">--Select --</option>
										<option value="Rajal Pulang"> Rawat Jalan Pulang</option>
										<option value="Rujuk"> Rujuk </option>										
										<option value="Meninggal"> Meninggal </option>										
										<option value="Isolasi diri"> Isolasi Diri </option>											
									</select>
								</div>							
							</div>

							<div class="form-row mt-2">
								<div class="col" id="form_rjp">
									<label class="control-label col-md">Tanggal RJP ?</label>
                                    <input type="date" class="form-control" id="odpnap_tgl_rjp" name="odpnap_tgl_rjp">
								</div>
								<div class="col" id="form_rujuk">
                                    <label class="control-label col-md">Rujuk ?</label>
										<select name="odpnap_rujuk_rs" id="odpnap_rujuk_rs" class="form-control">
										<option value="">--Select --</option>
										<option value="Rumah Sakit 1"> Rumah Sakit 1</option>
										<option value="Rumah Sakit 2"> Rumah Sakit 2</option>										
										<option value="Rumah Sakit 3"> Rumah Sakit 3</option>										
										<option value="Rumah Sakit 4"> Rumah Sakit 4</option>											
									</select>
								</div>	
							</div>	

							<div class="form-row mt-2">
								<div class="col" id="form_meninggal">
									<label class="control-label col-md">Meninggal ?</label>
                                    <input type="datetime-local" class="form-control" id="odpnap_meninggal_waktu" name="odpnap_meninggal_waktu">
								</div>
								<div class="col"  id="form_isolasidiri">
									<label>Isolasi Mandiri ?</label>
									<div class="input-group">
										<div class="input-group-prepend">
										<span class="input-group-text">
											<i class="far fa-calendar-alt"></i>
										</span>
										</div>
										<input type="text" class="form-control float-right" id="reservation" onchange="proses()" >
									</div>
								</div>	
							</div>
							<input type="hidden" class="form-control" id="odpnap_waktu_isolasi" name="odpnap_waktu_isolasi">
							
							<div class="form-row mt-2">	
								<div class="col">
								<label class="control-label col-md"></label>
									<input type="hidden" class="form-control" id="" name="">
								</div>								
								<div class="col">
                                    <label class="control-label col-md">Status Saat Ini</label>
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
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
