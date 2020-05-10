 <!-- Default box -->
 <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
          <?php foreach($contact as $cl) : ?>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                <?= $cl['username'] ?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?= $cl['name'] ?></b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> <?= $cl['alamat'] ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> <?= $cl['email'] ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                    <td><a href="<?= base_url ('assets/dist/img/profile/') . $cl ['name']; ?>" data-lightbox="<?= $cl['role_id']; ?>" data-title="<?= $cl['username']; ?>"> 
                  <img  src="<?= base_url('assets/dist/img/profile/') . $cl['foto']; ?>" alt="" class="img-circle img-fluid"></a>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="<?= base_url(); ?>contact/chat/<?= $cl['id_dd_user'];?>" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="<?= base_url(); ?>contact/detail/<?= $cl['id_dd_user'];?>" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
                
            