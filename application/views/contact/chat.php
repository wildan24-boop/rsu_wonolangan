
    <!-- Main content -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
   <?php if ($this->session->flashdata('flash')) : ?>
   <?php endif; ?>
   </section>
    <!-- /.content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <a href="<?= base_url('contact/tulis'); ?>" class="btn btn-primary btn-block mb-3">Tulis</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Folders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="<?= base_url('contact/chat'); ?>" class="nav-link">
                      <i class="fas fa-inbox"></i> Inbox
                      <span class="badge bg-primary float-right">12</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-envelope"></i> Sent
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-file-alt"></i> Drafts
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-filter"></i> Junk
                      <span class="badge bg-warning float-right">65</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-trash-alt"></i> Trash
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Labels</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-danger"></i> Important</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-warning"></i> Promotions</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><i class="far fa-circle text-primary"></i> Social</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
    
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <?php foreach($chat as $cl) : ?>
                  <tr>
                    <td>
                      <div class="icheck-primary">
                        <!-- <input type="checkbox" value="" id="check1"> -->
                        <input type="checkbox" name="id_mt_email[]" class="chk-box" value='".<?php echo $cl['id_mt_email']; ?>."'  />
                        <label for="check1"></label>
                      </div>
                    </td>
                    <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                    <td class="mailbox-name"><a href="<?= base_url(); ?>contact/baca/<?= $cl['id_mt_email'];?>"><?= $cl['to'] ?></a></td>
                    <td class="mailbox-subject"><b><?= $cl['subject'] ?></b> - Open Message...
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><?= $cl['tgl_input'] ?></td>
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
          
  <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>