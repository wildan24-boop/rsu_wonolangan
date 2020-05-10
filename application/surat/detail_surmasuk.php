
<!-- <section class="content"> -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <!-- <i class="fas fa-globe"></i> AdminLTE, Inc. -->
                    <img class="img-profile" width="320" height="100" src="<?= base_url('assets/dist/img/asli2.jpg')?>" >
                    <small class="float-right"><?= $surat_masuk ['tgl_terima']; ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Pengirim
                  <address>
                    <strong><?= $surat_masuk['nm_persero'] ?></strong><br>
                    <b>Nomor Surat :</b> <?= $surat_masuk ['nomor']; ?><br>
                    <b>Perihal :</b> <?= $surat_masuk ['hal']; ?><br>
                    <b>Agenda :</b> <?= $surat_masuk['agendaris']; ?><br>
                    <b>Alamat :</b> <?= $surat_masuk['alamat_persero']; ?><br>
                    Email: <?= $surat_masuk['alamat_email_client']; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Penerima
                  <address>
                    <strong><?= $surat_masuk ['penerima']; ?></strong><br>
                    <b>Kepada :</b> <?= $surat_masuk ['kepada']; ?><br> 
                    <b>Tanggal Surat :</b> <?= $surat_masuk ['tgl_surat']; ?><br> 
                    Email: rswonolangan@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                <b>File :</b><br>
                <div class="info-box">
                  <span class="info-box-icon bg-danger elevation-1" ><i class="fas fa-folder"></i></span>
                  <a href="<?= base_url ('surmasuk/'). $surat_masuk ['url_scan']; ?>" target="_blank"> 
                        <div class="info-box-content">
                          <span class="info-box-text"> <?php echo $surat_masuk['url_scan'] ?></span>
                          <span class="info-box-number">
                          <?php echo $surat_masuk['hal'] ?>
                  </span>
                  </a>
                  </div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">

                 <p class="lead">Diteruskan:</p>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    <b><?= $surat_masuk['keperluan'] ?></b><br>
                    <!-- <b>File</b><br> -->
                  </p>

                  <b>Respon :</b><?= $surat_masuk['flag_status'] ?><br>
                  <b>Sifat :</b><?= $surat_masuk['status'] ?><br>
                  <b>Catatan Disposisi :</b><br>
                  <?= $surat_masuk['komentar'] ?><br>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Disposisi</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%"></th>
                        <td></td>
                      </tr>
                      <tr>
                        <th></th>
                        <td></td>
                      </tr>
                      <tr>
                        <th></th>
                        <td></td>
                      </tr>
                      <tr>
                        <th></th>
                        <td></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12 mt-3">
                  <button class="btn btn-default" onclick="print()" target="_blank"><i class="fas fa-print"></i> Print</button>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    <!-- </section> -->
    <!-- /.content -->
  </div>
</div>