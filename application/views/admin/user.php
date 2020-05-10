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
  <div class="card-body">
	  <button class="btn btn-default md-3" onclick="reload_table_user()"> Reload <i class="fas fa-retweet"></i></button>
    		<table id="table_user" class="table display responsive nowrap mt-5" width="100%">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col"><i class="fas fa-users-cog"></i></th>
						<th scope="col">Name</th>
            <th scope="col">Username</th>
            <th scope="col">Role</th>
            <th scope="col">Active</th>				
					</tr>
				</thead>
				<tbody></tbody>
			</table> <!-- END ISI  --> 
  		</div>  <!-- /.card-body -->
	</div> <!-- /.card -->
	<div class="modal fade" id="modal_user" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body form">
				  <form action="#" id="form_user" class="form-horizontal">
	          <div class="form-body">
	            <input type="hidden" value="id_dd_user" name="id_dd_user"/> 
	            <div class="form-group">
	                <label class="control-label col-md-3">Nama</label>
		              <div class="col-md-9">
 	                    <input type="text" class="form-control input-sm" id="name" name="name">
		                  <span class="help-block"></span>
		              </div>
	            </div>
	            <div class="form-group">
	                <label class="control-label col-md-3">Username</label>
		              <div class="col-md-9">
 	                    <input type="text" class="form-control input-sm" id="username" name="username">
		                  <span class="help-block"></span>
		              </div>
            	</div>
	            <div class="form-group">
                  <label class="control-label col-md-3">Role</label>
                  <div class="col-md-9">
                      <select name="role_id" id="role_id" class="form-control">
                          <option value="">---Select Role</option>
                          <?php foreach($role as $m) : ?>
                          <option value="<?= $m['id']; ?>"><?=$m['role']; ?></option>
                          <?php endforeach; ?>
                      </select>
                        <span class="help-block"></span>
                  </div>
              </div>
              <div class="form-group">
	                <label class="control-label col-md-3">aktive</label>
		              <div class="col-md-9">
 	                    <input type="text" class="form-control input-sm" id="id_active" name="id_active">
		                  <span class="help-block"></span>
		              </div>
	            </div>
	          </div>
	        </form>
				</div>
				<div class="modal-footer justify-content-between">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
	          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
				</div> <!-- /.modal-content -->
			</div> <!-- /.modal-dialog -->	
		</div>
	</div>
	</div> <!-- /.modal -->
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->