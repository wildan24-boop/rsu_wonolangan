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
              <img class="img-profile" width="320" height="100" src="<?= base_url('assets/dist/img/asli2.jpg') ?>">
              <!-- <small class="float-right"><?= $surat['tgl_terima']; ?></small> -->
            </h4>
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <!-- accepted payments column -->
          <!-- /.col -->
          <div class="col-6">
            <p class="card-title m-0 font-weight-bold text-dark">IDENTITAS PASIEN</p>

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">NO RM</th>
                  <td><?= $pasien['no_rm']; ?></td>
                </tr>
                <tr>
                  <th>NAMA PASIEN</th>
                  <td><?= $pasien['nama_pasien']; ?></td>
                </tr>
                <tr>
                  <th>TANGGAL LAHIR</th>
                  <td><?= $pasien['tgl_lahir']; ?></td>
                </tr>
                <tr>
                  <th>UMUR</th>
                  <td><?= $pasien['umur']; ?></td>
                </tr>
                <tr>
                  <th>JENIS KELAMIN</th>
                  <td><?= $pasien['jenkel']; ?></td>
                </tr>
                <tr>

              </table>
            </div>
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-6">
            <p class="card-title m-0 font-weight-bold text-white">IDENTITAS OASIEN</p>

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">ALAMAT LENGKAP</th>
                  <td><?= $pasien['alamat_lengkap']; ?></td>
                </tr>
                <tr>
                  <th>KECAMATAN</th>
                  <td><?= $pasien['kecamatan']; ?></td>
                </tr>
                <tr>
                  <th>KABUPATEN/KOTA</th>
                  <td><?= $pasien['kab_kota']; ?></td>
                </tr>
                <tr>
                  <th>KOTA LAIN</th>
                  <td><?= $pasien['kota_lain']; ?></td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Qty</th>
                  <th>Product</th>
                  <th>Serial #</th>
                  <th>Description</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Call of Duty</td>
                  <td>455-981-221</td>
                  <td>El snort testosterone trophy driving gloves handsome</td>
                  <td>$64.50</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Need for Speed IV</td>
                  <td>247-925-726</td>
                  <td>Wes Anderson umami biodiesel</td>
                  <td>$50.00</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Monsters DVD</td>
                  <td>735-845-642</td>
                  <td>Terry Richardson helvetica tousled street art master</td>
                  <td>$10.70</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Grown Ups Blue Ray</td>
                  <td>422-568-642</td>
                  <td>Tousled lomo letterpress</td>
                  <td>$25.99</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- this row will not appear when printing -->
        <!-- <div class="row no-print">
				<div class="col-12 mt-3">
					<a class="btn btn-default" href="<?php echo base_url(); ?>covid/print_odprajal/<?php echo $surat['id_daftar_pasien']; ?>"  target="_blank"><i class="fas fa-print"></i> Print</a>
					<button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
						Payment
					</button>
					<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
						<i class="fas fa-download"></i> Generate PDF
					</button>
				</div>
			</div> -->
      </div>
      <!-- /.invoice -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
<!-- </section> -->
<!-- /.content -->
</div>
</div>