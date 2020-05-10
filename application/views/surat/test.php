<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>rsu wonolangan | print</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<form action="surat" method="POST">
<div class="wrapper">
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
                    <?php echo "uji" ;?>
                    <strong><?= $surat_masuk['nm_persero'] ?></strong><br>
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
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</form>
<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
