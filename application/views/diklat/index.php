

<div class="card ">
  <h4 class="card-header m-0 font-weight-bold text-primary"><?= $title; ?></h4>
  <div class="card-body">
  <?php if($this->session->userdata('role_id') == '1'){  ?> 
  <button class="btn btn-success" onclick="add_diklat()"><i class="glyphicon glyphicon-plus"></i> Add add_diklat</button>
  <?php } ?> 
	<button class="btn btn-default" onclick="reload_table_diklat()"> Reload <i class="fas fa-retweet"></i></button>

<div class="table-responsive mt-3">
    <table id="table_diklat" class="table display responsive nowrap" width="100%">
<thead>

<tr>
<th scope="col">No</th>
<th scope="col">Nomor Surat</th>
<th scope="col">Kategori</th>
<th scope="col">Perihal</th>
<th scope="col">Instansi / Rumah Sakit</th>
<th scope="col">Agenda</th>
<th scope="col">Tanggal Berangkat</th>
<th scope="col">Tanggal Kembali</th>
<th scope="col">Total Waktu</th>
<th scope="col">Ditugaskan</th>
<th scope="col">File Undangan</th>
<th scope="col">File Bukti TF</th>
<th scope="col">File Permohonan</th>
<th scope="col">File Surat TUgas</th>
<th scope="col">File Laporan Diklat</th>
<th scope="col">Action</th> 
</tr>
</thead>
<tbody></tbody>
</table>

      <div class="modal fade" id="modal_diklat" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body form">
              <form action="#" id="form_diklat" class="form-horizontal">
              <input type="hidden" value="id_diklat" name="id_diklat"/> 
                <div class="row">
                  <div class="col">
                  <label class="control-label col-md-6">Nomor Diklat</label>
                    <input type="text" class="form-control" id="nom_surat" name="nom_surat" placeholder="Nomor Diklat">
                  </div>
                <div class="col">
                  <label class="control-label col-md-6">Kategori</label>
                  <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori">
                </div>
              </div>
                <div class="row">
                  <div class="col">
                  <label class="control-label col-md-6">Perihal Surat</label>
                    <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal Surat">
                  </div>
                <div class="col">
                  <label class="control-label col-md-6">Instansi / Rumah Sakit</label>
                  <input type="text" class="form-control" id="instansi" name="instansi" placeholder="Instansi / Rumah Sakit">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label class="control-label col-md-6">Agenda</label>
                  <input type="text" class="form-control" id="agenda" name="agenda" placeholder="Agenda">
                </div>
              </div>
               <div class="row">
                 <div class="col">
                    <label class="control-label col-md-6">Tanggal Berangkat</label>
                    <input type="text" class="form-control" id="tgl_berangkat" name="tgl_berangkat" placeholder="Tanggal Berangkat">
                  </div>
                <div class="col">
                  <label class="control-label col-md-6">Tanggal Kembali</label>
                  <input type="text" class="form-control" id="tgl_kembali" name="tgl_kembali" placeholder="Tanggal Kembali">
                </div>
              </div>
              <div class="row">
                 <div class="col">
                    <label class="control-label col-md-6">Total Waktu</label>
                    <input type="text" class="form-control" id="total_waktu" name="total_waktu" placeholder="Total Waktu">
                  </div>
              </div>
              <div class="row">
                 <div class="col">
                    <label class="control-label col-md-6">Ditugaskan</label>
                    <input type="text" class="form-control" id="ditugaskan" name="ditugaskan" placeholder="Ditugaskan">
                  </div>
                </div>
                <div class="row">
                 <div class="col">
                    <label class="control-label col-md-6">File Undangan</label>
                    <input type="text" class="form-control" id="up_surat" name="up_surat" placeholder="File Undangan">
                  </div>
                <div class="col">
                  <label class="control-label col-md-6">File Bukti TF</label>
                  <input type="text" class="form-control" id="up_bukti_tf" name="up_bukti_tf" placeholder="File Bukti TF">
                </div>
              </div>
                <div class="row">
                 <div class="col">
                    <label class="control-label col-md-6">File Pengajuan Diklat</label>
                    <input type="text" class="form-control" id="up_surat_pengajuan" name="up_surat_pengajuan" placeholder="File Pengajuan Diklat">
                  </div>
                <div class="col">
                  <label class="control-label col-md-6">File Surat Tugas</label>
                  <input type="text" class="form-control" id="up_surat_tugas" name="up_surat_tugas" placeholder="File Surat Tugas">
                </div>
              </div>
              <div class="row">
                 <div class="col">
                    <label class="control-label col-md-6">File Laporan Diklat</label>
                    <input type="text" class="form-control" id="up_laporan" name="up_laporan" placeholder="File Laporan Diklat">
                  </div>
                </div>
            </form>
          </div>
            <div class="modal-footer justify-content-between">
            <button type="button" id="btnSave_diklat" onclick="save_diklat()" class="btn btn-primary">Save</button>
	            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>
      </div>
      <!-- /.modal -->