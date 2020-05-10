<!-- Main content -->
<section class="content" >
<!-- Default box -->
<div class="card">
  <div class="card-header bg-primary">
    <h3 class="card-title m-0 font-weight-bold text-white"><?= $title; ?></h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash21'); ?>"></div>
    <?php if ($this->session->flashdata('flash21')) : ?>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>
	<div class="card-tools">
	  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		<i class="fas fa-minus"></i></button>
	  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		<i class="fas fa-times"></i></button>
	</div>
  </div>
  <div class="card-body">
		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal">INSERT NEW ROLE</a>
		<div class="table-responsive mt-3">
    		<table id="dataTables-example" class="table display responsive nowrap" width="100%">
            </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['role']; ?></td>
                            <td>
                            <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">access</a>
                            <a href="" class="badge badge-success">Edit</a>
                            <a href="" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
			</table> <!-- END ISI  --> 
  		</div>  <!-- /.card-body -->
	</div> <!-- /.card -->
	<!-- Modal -->
    <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/role'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    <!-- End Modal -->
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->