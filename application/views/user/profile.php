
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <td><a href="<?= base_url ('assets/dist/img/profile/') . $contact ['name']; ?>" data-lightbox="<?= $contact['role_id']; ?>" data-title="<?= $contact['username']; ?>"> 
                  <img  src="<?= base_url('assets/dist/img/profile/') . $contact['foto']; ?>" alt="User profile picture" class="profile-user-img img-fluid img-circle"></a>
                </div>

                <h3 class="profile-username text-center"><?= $contact['name']; ?></h3>

                <p class="text-muted text-center"><?= $contact['username']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?= $contact['email']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Jabatan</b> <a class="float-right"><?= $contact['nama_jabatan']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Role</b> <a class="float-right"><?= $contact['role']; ?></a>
                  </li>
                </ul>
                <a href="" onclick="edit_profile()"class="btn btn-primary btn-block"> Edit Profile</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Instansi</strong>

                <p class="text-muted">
                  Rumah Sakit Umum Wonolangan 
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted"><?= $contact['alamat']; ?></p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Status</strong>

                <p class="text-muted">
                <?= $contact['status']; ?>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Telepon</strong>

                <p class="text-muted"><?= $contact['no_hp']; ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">COMING SOON</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Detail Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> 
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <!-- <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image"> -->
                        <span class="username">
                          <a href="#">INFORMASI</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - FEBRUARI</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                      <h4 class="card-header m-0 font-weight-bold text-primary">COMING SOON</h4>
                      </p>

                      <!-- <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p> -->

                      <!-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> -->
                    </div>
                    <!-- /.post -->

                    

                    
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="<?=base_url('user/changepassword'); ?>" method="post">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control"id="current_password" name="current_password" placeholder="Password lama">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal_profile">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
						<form action="" id="form_profile" class="form-horizontal" method="post" enctype="multipart/form-data" >
            <div class="modal-body">
						<input type="hidden"  id="id_dd_user" name="id_dd_user"/> 
						<input type="hidden"  id="no_induk" name="no_induk"/> 


  <div class="form-row">
    <div class="col">
		<label class="control-label col-md-6">Tanggal Terima</label>
      <input type="date" class="form-control" id="tgl_terima" name="tgl_terima">
    </div>
    <div class="col">
		<label class="control-label col-md-6">Tanggal Surat</label>
      <input type="date" class="form-control" id="tgl_terima" name="tgl_terima" placeholder="State">
    </div>
  </div>

	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">Nomor Surat</label>
		<input type="text" class="form-control input-sm" id="nomor" name="nomor">
    </div>
    <div class="col">
		<label class="control-label col-md-6">Penerima Surat</label>
		<select name="penerima" id="penerima" class="form-control">
					<option value="">--Select Penerima--</option>
								 <option value="Sekretariat"> Sekretariat </option>
					 </select>
    </div>
  </div>

 
	 <div class="form-group mt-3">
	 <label class="control-label col-md-6">Perihal</label>
		 <div class="col-md-12">
		 <textarea type="text" class="form-control" id="hal" name="hal"> </textarea>
		 <span class="help-block"></span>
		 </div>
	 </div>

	 <div class="form-group mt-3">
	 <label class="control-label col-md-6">Agenda</label>
		 <div class="col-md-12">
		 <textarea type="text" class="form-control" id="agendaris" name="agendaris"> </textarea>
		 <span class="help-block"></span>
		 </div>
	 </div>

 	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">Pengirim</label>
			<select name="pengirim" id="pengirim" class="form-control">
					<option value="">--Select Pengirim--</option>
					<?php foreach($client as $cl) : ?>
								 <option value="<?= $cl['id_mt_client'] ?>"> <?= $cl['nm_persero'] ?></option>
								 <?php endforeach ?>
					 </select>
    </div>
    <div class="col">
		<label class="control-label col-md-6">Alamat Pengirim</label>
		<input type="text" class="form-control input-sm" id="alamat_pengirim" name="alamat_pengirim">
    </div>
  </div>

	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">Kepada</label>
		<select name="kepada" id="kepada" class="form-control">
					<option value="">--Select Kepada--</option>
								 <option value="Kepala RSUW"> Kepala RSUW</option>
		</select>
    </div>
    <div class="col">
		<label class="control-label col-md-6">File Upload</label>
		<input type="file" id="url_scan" name="url_scan">
    </div>
  </div>
	
<div class="form-group mt-3">
  <div class="form-check">
	<label class="form-check-label" for="status" > Rahasia ? <i class="fa fa-edit ml-2"></i></label>
  <input class="form-check-input" type="checkbox" 
  value="Rahasia" name="status" id="status" >
 
  </div>
</div>
</form>
            </div>
            <div class="modal-footer justify-content-between">
						<button type="button" id="btnSave_masuk" onclick="save_masuk()" class="btn btn-primary">Save</button>
	          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->