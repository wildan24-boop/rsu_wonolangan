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
            <button class="btn btn-success" onclick="add_menu()"><i class="glyphicon glyphicon-plus"></i> INSERT NEW MENU</button>
	          <button class="btn btn-default" onclick="reload_table_menu()"> Reload <i class="fas fa-retweet"></i></button>
          <div class="table-responsive mt-3">
              <table id="table_menu" class="table display responsive nowrap" width="100%">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col"><i class="fas fa-users-cog"></i></th>
                  <th scope="col">Menu Management</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table> <!-- END ISI ------------------------------------> 
            </div>  <!-- /.card-body -->
          </div> <!-- /.card -->
          <div class="modal fade" id="modal_menu" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body form">
                  <form action="#" id="form_menu" class="form-horizontal">
                    <div class="form-body">
                      <input type="hidden" value="id" name="id"/> 
                      <div class="form-group">
                        <label class="control-label col-md-6">Menu Management</label>
                        <div class="col-md-9">
                          <input type="text" class="form-control input-sm" id="menu" name="menu">
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" id="btnSave_menu" onclick="save_menu()" class="btn btn-primary">Save</button>
	                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
              </div> <!-- /.modal-content -->
            </div> <!-- /.modal-dialog -->	
          </div>
      </div>
    </div> <!-- /.modal -->
  </section> <!-- /.content -->
  </div> <!-- /.content-wrapper -->