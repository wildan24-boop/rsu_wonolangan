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
	<?php if($this->session->userdata('role_id') == '1'){  ?> <!-- ISI -->
		<button class="btn btn-primary" onclick="add_client()"><i class="glyphicon glyphicon-plus"></i> INSERT NEW CLIENT</button>
	<?php } ?>
		<button class="btn btn-default" onclick="reload_table_client()"> Reload <i class="fas fa-retweet"></i></button>
		<div class="table-responsive mt-3">
    		<table id="table_client" class="table display responsive nowrap" width="100%">
				<thead>
					<tr>
						<th scope="col">No</th>
						<?php if($this->session->userdata('role_id') == '1'){  ?>
						<th scope="col"><i class="fas fa-users-cog"></i></th>
						<?php } ?>
						<th scope="col">Nama Persero</th>
						<th scope="col">Alamat Persero</th>
						<th scope="col">No Telpon Client</th>				
					</tr>
				</thead>
				<tbody></tbody>
			</table> <!-- END ISI  --> 
  		</div>  <!-- /.card-body -->
	</div> <!-- /.card -->
	<div class="modal fade" id="modal_client" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body form">
				<form action="#" id="form_client" class="form-horizontal">
					<div class="form-body">
						<input type="hidden" value="id_mt_client" name="id_mt_client"/> 
						<div class="form-group">
							<label class="control-label col-md-6">Nama Persero</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-sm" id="nm_persero" name="nm_persero">
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-6">Alamat Persero</label>
							<div class="col-md-9">
								<textarea type="text" class="form-control" id="alamat_persero" name="alamat_persero"> </textarea>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-6">No Telfon Client</label>
							<div class="col-md-9">
								<input type="text" class="form-control input-sm" id="no_telpon_client" name="no_telpon_client">
								<span class="help-block"></span>
							</div>
						</div>		
					</div>
				</form>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" id="btnSave_client" onclick="save_client()" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
				</div> <!-- /.modal-content -->
			</div> <!-- /.modal-dialog -->	
		</div>
	</div>
	</div> <!-- /.modal -->
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->




