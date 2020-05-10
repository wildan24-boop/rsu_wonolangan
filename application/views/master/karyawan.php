<!-- Main content -->
<section class="content" >
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
        <div class="card-body"> <!-- /.card-body -->
        <?php if($this->session->userdata('role_id') == '1'){  ?> <!-- ISI ---------------------->
          <button class="btn btn-primary" onclick="add_karyawan()"><i class="glyphicon glyphicon-plus"></i> INSER NEW KARYAWAN</button>
        <?php } ?>
          <button class="btn btn-default" onclick="reload_table_karyawan()"> Reload <i class="fas fa-retweet"></i></button>
          <div class="table-responsive mt-3">
              <table id="table_karyawan" class="table display responsive nowrap" width="100%">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <?php if($this->session->userdata('role_id') == '1'){  ?>
                  <th scope="col"><i class="fas fa-users-cog"></i></th>
                  <?php } ?>
                  <th scope="col">NIK</th>
                  <th scope="col">Nama Karyawan</th>
                  <th scope="col">Jabatan</th>
                  <th scope="col">Status</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">No HP</th>
                  <th scope="col">Email</th>			
                </tr>
              </thead>
              <tbody></tbody>
            </table> <!-- END ISI ------------------------------------> 
            </div>  <!-- /.card-body -->
          </div> <!-- /.card -->
          <div class="modal fade" id="modal_karyawan" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body form">
                  <form action="#" id="form_karyawan" class="form-horizontal">
                    <div class="form-body"> 	
                      <div class="form-row">
                        <div class="col">
                          <label class="control-label col-md-6">Nik</label>
                          <input type="text" class="form-control" id="no_induk" name="no_induk">
                        </div>
                      </div>
                      <div class="form-row mt-3">
                        <div class="col">
                          <label class="control-label col-md-6">Nama Karyawan</label>
                          <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai">
                        </div>
                      <div class="col">
                        <label class="control-label col-md-6">Jabatan</label>
                        <select name="kode_jabatan" id="kode_jabatan" class="form-control">
                          <option value="">--Select Jabatan--</option>
                          <?php foreach($jabatan as $cl) : ?>
                          <option value="<?= $cl['kode_jabatan'] ?>"> <?= $cl['nama_jabatan'] ?></option>
                          <?php endforeach ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-row mt-3">
                      <div class="col">
                        <label class="control-label col-md-6">Status</label>
                        <select name="status" id="status" class="form-control">
                          <option value="">--Select Status--</option>
                          <option value="Belum Kawin">Belum Kawin</option>
                         <option value="Kawin">Kawin</option>
                        </select>
                      </div>
                      <div class="col">
                        <label class="control-label col-md-6">Alamat</label>
                        <textarea type="text" class="form-control" id="alamat" name="alamat"> </textarea>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="form-row mt-3">
                      <div class="col">
                        <label class="control-label col-md-6">No Hp</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                      </div>
                      <div class="col">
                        <label class="control-label col-md-6">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="State">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" id="btnSave_karyawan" onclick="save_karyawan()" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
            </div> <!-- /.modal-content -->
          </div> <!-- /.modal-dialog -->	
        </div>
      </div>
    </div> <!-- /.modal -->
  </section> <!-- /.content -->
  </div> <!-- /.content-wrapper -->










