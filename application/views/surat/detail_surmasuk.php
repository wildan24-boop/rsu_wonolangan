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
							<img class="img-profile" width="320" height="100" src="<?= base_url('assets/dist/img/asli2.jpg')?>">
							<small class="float-right"><?= $surat['tgl_terima']; ?></small>
						</h4>
					</div>
					<!-- /.col -->
				</div>
				<!-- info row -->
				<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">
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
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
						Penerima
						<address>
							<strong><?= $surat['penerima']; ?> RSU Wonolangan</strong><br>
							<b>Kepada :</b> <?= $surat['kepada']; ?><br>
							<b>Tanggal Surat :</b> <?= $surat['tgl_surat']; ?><br>
							Email: rswonolangan@gmail.com
						</address>
					</div>
					<!-- /.col -->
					<div class="col-sm-4 invoice-col">
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
					</div>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

			<div class="row">
				<!-- accepted payments column -->
				<div class="col-6">

					<p class="lead">Paraf :</p>
					<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
						<b><?= $surat['ka_bag_aku']; ?><?= $surat['ka_bag_yan']; ?></b><br>
						<!-- <b>File</b><br> -->
					</p>

					<b>Sifat :</b><?= $surat['status']; ?><br>
					<b>Catatan <?= $surat['ka_bag_aku']; ?> <?= $surat['ka_bag_yan']; ?></b><br>
					<?= $surat['catatan_surat']; ?><br>
				</div>
				<!-- /.col -->
				<div class="col-6">
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
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

			<!-- this row will not appear when printing -->
			<div class="row no-print">
				<div class="col-12 mt-3">
					<a class="btn btn-default" href="<?php echo base_url(); ?>surat/print_surmasuk/<?php echo $surat['id_sur_masuk']; ?>"  target="_blank"><i class="fas fa-print"></i> Print</a>
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
