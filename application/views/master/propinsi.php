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
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
        <?php endif; ?>
        <div class="card-body"> <!-- /.card-body -->
        <?php if($this->session->userdata('role_id') == '1'){  ?> <!-- ISI ---------------------->
          <button class="btn btn-primary" onclick="add_propinsi()"><i class="glyphicon glyphicon-plus"></i> INSERT NEW PROPINSI</button>
        <?php } ?> 
	        <button class="btn btn-default" onclick="reload_table_propinsi()"> Reload <i class="fas fa-retweet"></i></button>
          <div class="table-responsive mt-3">
              <table id="table_propinsi" class="table display responsive nowrap" width="100%">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <?php if($this->session->userdata('role_id') == '1'){  ?>
                  <th scope="col"><i class="fas fa-users-cog"></i></th>
                  <?php } ?>
                  <th scope="col">Propinsi</th>
                  <th scope="col">Negara</th>	
                </tr>
              </thead>
              <tbody></tbody>
            </table> <!-- END ISI ------------------------------------> 
            </div>  <!-- /.card-body -->
          </div> <!-- /.card -->
          <div class="modal fade" id="modal_propinsi" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body form">
                  <form action="#" id="form_propinsi" class="form-horizontal">
                      <input type="hidden" value="id_dc_propinsi" name="id_dc_propinsi"/> 
                      <div class="row">
                        <div class="col">
                          <label class="control-label col-md-6">Propinsi</label>
                          <input type="text" class="form-control" id="nama_propinsi" name="nama_propinsi" placeholder="First name">
                        </div>
                        <div class="col">
                          <label class="control-label col-md-6">Negara</label>
                          <select name="id_dc_negara" id="id_dc_negara" class="form-control">
                            <option value="">--Select Negara--</option>
                            <?php foreach($negara as $cl) : ?>
                            <option value="<?= $cl['id_dc_negara'] ?>"> <?= $cl['nama_negara'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                      </div>
                   </form>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" id="btnSave_propinsi" onclick="save_propinsi()" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
              </div> <!-- /.modal-content -->
            </div> <!-- /.modal-dialog -->	
          </div>
      </div>
    </div> <!-- /.modal -->
  </section> <!-- /.content -->
  </div> <!-- /.content-wrapper -->
