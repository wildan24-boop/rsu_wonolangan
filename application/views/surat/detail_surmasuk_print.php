<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title; ?></title>
	<!-- Favicon-->
	<link rel="icon" href="<?= base_url(); ?>assets/dist/img/favicon.ico" type="image/x-icon">
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
	<div class="wrapper">
		<!-- Main content -->
		<section class="invoice">
			<!-- title row -->
			<div class="row">
				<div class="col-12">
					<h4>
						<!-- <i class="fas fa-globe"></i> AdminLTE, Inc. -->
						<img class="img-profile" width="320" height="100"
							src="<?= base_url('assets/dist/img/asli2.jpg')?>">
						<small class="float-right"><?php echo $surat['tgl_terima'] ?></small>
					</h4>
				</div>
				<!-- /.col -->
			</div>
			<!-- info row -->
			<div class="row invoice-info">
				<div class="col-sm-4 invoice-col">
				<h5>
					Pengirim
					<address>
						<strong><?= $surat['sur_dari']; ?></strong><br>
						<b>Nomor Surat :</b> <?= $surat['jenis_surat']; ?>/20.<?= $surat['no_surat']; ?><br>
						<b>Perihal :</b> <?= $surat['perihal_surat']; ?><br>
						<b>Agenda :</b><br>
						<?= $surat['agenda_surat']; ?><br>
						<b>Alamat :</b> <?= $surat['alamat_persero']; ?><br>
						Email: <?= $surat['alamat_email_client']; ?>
					</address>
				</h5>
				</div>
				<!-- /.col -->
				<div class="col-sm-4 invoice-col">
				<h5>
					Penerima
					<address>
						<strong><?= $surat['penerima']; ?> RSU Wonolangan</strong><br>
						<b>Kepada :</b> <?= $surat['kepada']; ?><br>
						<b>Tanggal Surat :</b> <?= $surat['tgl_surat']; ?><br>
						Email: rswonolangan@gmail.com
					</address>
				</h5>
				</div>
				<!-- /.col -->
				<div class="col-sm-4 invoice-col">
				<h5>
					<b>File :</b><br>
					<div class="info-box">
						<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-folder"></i></span>
						<a href="<?= base_url ('surmasuk/'). $surat ['upload_surat']; ?>" target="_blank">
							<div class="info-box-content">
								<span class="info-box-text"> <?= $surat['upload_surat']; ?></span>
								<span class="info-box-number">
									<?php echo $surat['perihal_surat'] ?>
								</span>
						</a>
					</div>
				</h5>
				</div>
			</div>
			<!-- /.col -->
	</div>
	<!-- /.row -->

	<div class="row">
		<!-- accepted payments column -->
		<div class="col-6">
		<h5>
			<p class="lead">Paraf :</p>
			<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
				<b><b><?= $surat['ka_bag_aku']; ?><?= $surat['ka_bag_yan']; ?></b><br><br>
				<!-- <b>File</b><br> -->
			</p>

			<b>Sifat :</b><?= $surat['status']; ?><br>
			<b>Catatan <?= $surat['ka_bag_aku']; ?></b><br>
			<b>Catatan <?= $surat['ka_bag_yan']; ?></b><br>
			<?= $surat['catatan_surat']; ?><br>
		</h5>
		</div>
		<!-- /.col -->
		<div class="col-6">
		<h5>
			<p class="lead">Disposisi :</p>
			<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
				<b> <?= $surat['pro_disposisi']; ?></b><br>
				<!-- <b>File</b><br> -->
			</p>

			<b>Respon :</b> <?= $surat['pro_diterima']; ?><br>
			<b>Disposisi :</b><br>
			<?= $surat['id_disposisi']; ?><br>
			<b>Catatan Kepala Rumah Sakit</b><br>
			<?= $surat['catatan_ka_rs']; ?><br>
		</h5>
		</div>
	</div>
	<!-- /.row -->
	<!-- this row will not appear when printing -->
			
	</section>
	<!-- /.content -->
	</div>
	<!-- ./wrapper -->

	<script type="text/javascript">
		window.addEventListener("load", window.print());

	</script>
</body>

</html>
