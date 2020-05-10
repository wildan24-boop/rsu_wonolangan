<!-- Main content -->
<section class="content" >
<!-- Default box -->
<div class="card">
  <div class="card-header bg-primary">
    <h3 class="card-title m-0 font-weight-bold text-white"><?= $title; ?></h3>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash20'); ?>"></div>
    <?php if ($this->session->flashdata('flash20')) : ?>
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
		 <h5 class="card-title m-0 font-weight-bold text-primary"> Role : <?= $role['role']; ?></h5>
		 <div class="table-responsive mt-5">
    		<table id="dataTables-example" class="table display responsive nowrap" width="100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Access</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $m['menu']; ?></td>
                        <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                        </div>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
			</table> <!-- END ISI  --> 
  		</div>  <!-- /.card-body -->
	</div> <!-- /.card -->
</section> <!-- /.content -->
</div> <!-- /.content-wrapper -->