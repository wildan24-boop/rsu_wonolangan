<!doctype html>
<html lang="en">
<head>
 <!-- Require meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" contect="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Bootstrap Css-->
 <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">

 <title><?= $title; ?></title>

 <style>
 .line-title{
     border : 0;
     border-style: inset;
     border-top: 1 px solid #000;
     margin-top: 20px;
 }

 </style>
 </head>
 <body>
  <?php
function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
}
?>
<img class="img-profile" width="320" height="100" src="assets/dist/img/asli2.jpg" >
<small class="float-right"><?= $surat ['tgl_terima']; ?></small>
 <table style="width: 750px;">
   <tr>
    <td align="center">
    <span style="line-height: 1.6; font-weight: bold;">
    <?= $surat ['tgl_terima']; ?>
        AKADEMI MANAJEMEN INFORMATIKA DAN KOMPUTER
          <br>AMIK TARUNA PROBOLINGGO
          <br>PROBOLINGGO INDONESIA
        </span>
    </td>
 </tr>
 </table>

 <hr class="line-title"> 
  <p align="center">
  Sistem Pemantauan Tugas Akhir<br>
    <b> Angkatan <?php
 $tgl=date('Y');
 echo $tgl;
 ?></b>
 <br>
 <h3 align="center"><?= $surat["tgl_terima"]; ?></h3>
 <h3 align="center"><?= $title; ?></h3>
 <h5 align="right">Tanggal Cetak : <?= date('d F, Y'); ?></h5>
 <br>

 <table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col"></th>
      <th width="200px" ></th>
      <th scope="col"></th>
      <th width="200px" ></th>
    </tr>
  </thead>
  <?php foreach ($surat as $rec):?>

  <tbody>
    <tr>
      <th scope="col">Nim</th>
      <td><input type="text" name="tgl_terima" readonly class="form-control" id="tgl_terima" value="<?= $rec['tgl_terima']; ?>"></td>
      <td scope="col">Bahasa Program</td>
      <td><input type="text" name="namapro" readonly class="form-control" id="namapro" value="<?= $rec['namapro'] ?>"></td>
    </tr>
    <tr>
      <td scope="col">Nama Mahasiswa</td>
      <td><input type="text" name="nama" readonly class="form-control" id="nama" value="<?= $rec['nama']; ?>"></td>
      <td scope="col">Database</td>
      <td><input type="text" name="namadata" readonly class="form-control" id="namadata" value="<?= $rec['namadata'] ?>"></td>
    </tr>
    <tr>
      <th scope="col">Jurusan</th>
      <td><input type="text" name="name" readonly class="form-control" id="name" value="<?= $rec['name'] ?>"></td>
      <td scope="col">Judul Tugas Akhir</td>
      <td><input type="text" name="judul" readonly class="form-control" id="judul" value="<?= $rec['judul']; ?>"></td>
    </tr>
    <tr>
      <th scope="col"></th>
      <td></td>
      <td scope="col">Status</td>
      <td><input type="text" name="status" readonly class="form-control" id="status" value="<?= $rec['status']; ?>"></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>

<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col"></th>
      <th width="200px" ></th>
      <th scope="col"></th>
      <th width="200px" ></th>
    </tr>
  </thead>
  <?php foreach ($proposal as $rec):?>
  <tbody>
    <tr>
      <th scope="col">Pembimbing 1</th>
      <td><input type="text" name="namefull" readonly class="form-control" id="namefull" value="<?= $rec['namefull']; ?>"></td>
      <td scope="col">Pembimbing 2</td>
      <td><input type="text" name="namefull2" readonly class="form-control" id="namefull2" value="<?= $rec['namefull2'] ?>"></td>
    </tr>
    <tr>
      <td scope="col">Panelis 1</td>
      <td><input type="text" name="namefull3" readonly class="form-control" id="namefull3" value="<?= $rec['namefull3']; ?>"></td>
      <td scope="col">Panelis 2</td>
      <td><input type="text" name="namefull4" readonly class="form-control" id="namefull4" value="<?= $rec['namefull4'] ?>"></td>
    </tr>
    <tr>
      <th scope="col">Penguji 1</th>
      <td><input type="text" name="namefull5" readonly class="form-control" id="namefull5" value="<?= $rec['namefull5'] ?>"></td>
      <td scope="col">Penguji 2</td>
      <td><input type="text" name="namefull6" readonly class="form-control" id="namefull6" value="<?= $rec['namefull6']; ?>"></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>
<br>

</body>
<div class="fixed-bottom bg-white">
        <div class="container my-auto">
          <div class="copyright text-center text-danger my-auto">
            <h6><span>Copyright &copy; Sistem pemantauan tugas akhir 2019</span></h6>
          </div>
        </div>
</html>
