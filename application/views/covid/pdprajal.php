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
			
			<!-- <button class="btn btn-primary" onclick="add_pdprajal()"><i class="glyphicon glyphicon-plus"></i> TAMBAH PASIEN</button> -->
	
			<button class="btn btn-default" onclick="reload_table_pdprajal()"> Reload <i
					class="fas fa-retweet"></i></button>
			<div class="table-responsive mt-3">
				<table id="table_pdprajal" class="table display responsive nowrap" width="100%">
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
		<div class="modal fade" id="modal_pdprajal">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"></h4>
					</div>
					<form action="" id="form_pdprajal" class="form-horizontal" method="post"
						enctype="multipart/form-data">
						<div class="modal-body">
							<input type="hidden" id="id_daftar_pasien" name="id_daftar_pasien" />
							<!-- <input type="hidden" id="kd_unik" name="kd_unik" /> -->

							<div class="form-row mt-2">
								<div class="col">
									<label class="control-label col-md">Nomor RM</label>
                                    <select name="no_rm" id="no_rm" class="form-control" >
                                    <option value="">--Select Pasien--</option>
										<?php foreach($pasien as $cl) : ?>
										<option value="<?= $cl['nama_pasien'] ?>"> <?= $cl['no_rm'] ?> - <?= $cl['nama_pasien'] ?></option>
										<?php endforeach ?>
									</select>
                                </div>
							</div>                        

							<div class="form-row">
                                <div class="col">
                                    <label class="control-label col-md">DL</label>
									<select name="pdpjal_dl" id="pdpjal_dl" class="form-control">
										<option value="">--Select--</option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak </option>										
									</select>
                                </div>
                            </div>
                            
							<div class="form-row">
                                <div class="col">
                                    <label class="control-label col-md">Pemeriksaan Rontgen Thorax</label>
									<select name="pdpjal_ront_thorax" id="pdpjal_ront_thorax" class="form-control">
										<option value="">--Select--</option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak </option>										
									</select>
                                </div>
                                <div class="col">
                                    <label class="control-label col-md">Rapid Tes</label>
									<select name="pdpjal_rapid_tes" id="pdpjal_rapid_tes" class="form-control">
										<option value="">--Select--</option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak </option>										
									</select>
                                </div>
                                <div class="col">                                   
									<label class="control-label col-md">Hasil Rapid Tes</label>
                                    <input type="text" class="form-control" id="pdpjal_hasil_rapid" name="pdpjal_hasil_rapid">
                                </div>
                            </div>
                            
							<div class="form-row">
                                <div class="col">
                                    <label class="control-label col-md">Swab </label>
									<select name="pdpjal_swab" id="pdpjal_swab" class="form-control">
										<option value="">--Select--</option>
										<option value="Ya">Ya</option>
										<option value="Tidak">Tidak </option>										
									</select>
                                </div>
                                <div class="col">                                   
									<label class="control-label col-md">Tanggal Ambil Sample</label>
                                    <input type="date" class="form-control" id="pdpjal_tgl_ambil_sample" name="pdpjal_tgl_ambil_sample">
                                </div>
                                <div class="col">                                   
									<label class="control-label col-md">Tanggal Kirim Sample</label>
                                    <input type="date" class="form-control" id="pdpjal_tgl_kirim_sample" name="pdpjal_tgl_kirim_sample">
                                </div>
                            </div>
                            
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
					<button type="button" id="btnSave_pdprajal" onclick="save_pdprajal()"
						class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div> <!-- /.modal-content -->
		</div> <!-- /.modal-dialog -->
	</div>
	</div>
	</div> <!-- /.modal -->

</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
