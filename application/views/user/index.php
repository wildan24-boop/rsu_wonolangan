      <!-- Main content -->
      <section class="content" style="background-image: url('<?= base_url('assets/dist/img/sidebar2.png')?>')">
      <!-- Default box -->
     
       <!-- Small boxes (Stat box) -->
       <div class="row">
       <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash63'); ?>"></div>
       <?php if ($this->session->flashdata('flash63')) : ?>
        <?php endif; ?>
        <?php if($this->session->userdata('role_id') == '1'){  ?> <!-- ISI -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $this->admin->get_data('dd_user')->num_rows(); ?></h3>

                <p>Data User<?php echo $this->session->userdata('dmenu')?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?=Base_url('admin/user');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $this->admin->get_data('mt_client')->num_rows(); ?></h3>

                <p>Master Client</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=Base_url('master/client');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $this->admin->get_data('mt_karyawan')->num_rows(); ?></h3>

                <p>Master Karyawan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?=Base_url('master/karyawan');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $this->admin->get_data('tc_surat_keluar')->num_rows(); ?></h3>

                <p>Surat Keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?=Base_url('surat/keluar');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3><?php echo $this->admin->get_data('tc_surat_masuk')->num_rows(); ?></h3>

                <p>Surat Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?=Base_url('surat/masuk');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h3><?php echo $this->admin->get_data('mt_jabatan')->num_rows(); ?></h3>

                <p>Master Jabatan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?=Base_url('master/jabatan');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #FF6400">
              <div class="inner">
                <h3><?php echo $this->admin->get_data('dc_kota')->num_rows(); ?></h3>

                <p>Master Kota</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?=Base_url('master/kota');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #00FFF0">
              <div class="inner">
                <h3><?php echo $this->admin->get_data('dc_propinsi')->num_rows(); ?></h3>

                <p>Master Propinsi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?=Base_url('master/propinsi');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <!-- ./col -->
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #FF008F">
              <div class="inner">
                <h3><?php echo $this->admin->get_data('dc_negara')->num_rows(); ?></h3>

                <p>Master Negara</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?=Base_url('master/negara');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  