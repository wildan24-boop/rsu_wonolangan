<!-- Content Header (Page header) -->
  <div class="content-header" style="background-image: url('<?= base_url('assets/dist/img/sidebar3.png')?>')">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 font-weight-bold text-primary">DASHBOARD</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
              <li class="breadcrumb-item"><button onclick="changepassword()">Ganti Password</button></li>
              <!-- <li class="breadcrumb-item"><a onclick="changepassword()">Ganti Password</a></li> -->
              <li class="breadcrumb-item"><a href="<?= base_url('auth/logout'); ?>">Logout</a></li>
              <li class="breadcrumb-item active">RSU Wonolangan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->