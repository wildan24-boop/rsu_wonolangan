<!-- Begin Page Content -->

<div class="container-fluid">
  <!-- Page Heading -->
<div class="row mt-3">
<div class="col-sm-12">

<div class="card">
  <div class="card-header" >

<div class="card-body">
<div class="bg-img" >
</div>
<form action="surat/detail_surkeluar" id="" class="form-horizontal" method="post" enctype="multipart/form-data" >

<input type="hidden" id="id_tc_surat_keluar" name="id_tc_surat_keluar"/> 

<div class="form-row">
  <div class="col">
	<label class="control-label col-md-6">Tanggal Surat</label>
    <input type="text" class="form-control input-sm" id="tgl_surat" name="tgl_surat" value="<?= $surat_keluar ['tgl_surat']; ?>" readonly >
    </div>
    <div class="col">
		<label class="control-label col-md-6">Tanggal Kirim</label>
		<input type="text" class="form-control input-sm" id="tgl_kirim" name="tgl_kirim" value="<?= $surat_keluar ['tgl_kirim']; ?>" readonly >
    </div>
  </div>


	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">Nomor Surat</label>
		<input type="text" class="form-control input-sm" id="nomor" name="nomor" value="<?= $surat_keluar ['nomor']; ?>" readonly >
    </div>
    <div class="col">
		<label class="control-label col-md-6">Nomor Surat</label>
		<input type="text" class="form-control input-sm" id="pengirim" name="pengirim" value="<?= $surat_keluar ['pengirim']; ?>" readonly >
    </div>
  </div>

 
	 <div class="form-group mt-3">
	 <label class="control-label col-md-6">Perihal</label>
		 <div class="col-md-12">
		 <textarea type="text" class="form-control" id="hal" name="hal" readonly> <?= $surat_keluar ['hal']; ?> </textarea>
		 <span class="help-block"></span>
		 </div>
	 </div>

	 <div class="form-group mt-3">
	 <label class="control-label col-md-6">Agenda</label>
		 <div class="col-md-12">
		 <textarea type="text" class="form-control" id="agendaris" name="agendaris"> <?= $surat_keluar ['agendaris']; ?>  </textarea>
		 <span class="help-block"></span>
		 </div>
	 </div>

	 <div class="form-group mt-3">
	 <label class="control-label col-md-6">Keterangan</label>
		 <div class="col-md-12">
		 <textarea type="text" class="form-control" id="keterangan" name="keterangan"> <?= $surat_keluar ['keterangan']; ?> </textarea>
		 <span class="help-block"></span>
		 </div>
	 </div>

 	<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">Keapada</label>
		<input type="text" class="form-control input-sm" id="id_mt_client" name="id_mt_client" value="<?= $surat_keluar ['nm_persero']; ?>" readonly >
    </div>
    <div class="col">
		<label class="control-label col-md-6">Alamat</label>
		<input type="text" class="form-control input-sm" id="alamat" name="alamat" value="<?= $surat_keluar ['alamat']; ?>" readonly>
    </div>
  </div>


<div class="form-row mt-3">
    <div class="col">
		<label class="control-label col-md-6">File Upload</label>
		<input type="file" id="url_scan" name="url_scan">
    </div>
  </div>
	</form>
<div class="form-group mt-3">
  <div class="form-check">
	<label class="form-check-label" for="status_surat" > Rahasia ? <i class="fa fa-edit ml-2"></i></label>
   <input class="form-check-input" type="checkbox" value="Rahasia" name="status_surat" id="status_surat" >
  </div>
</div>
</div>
</form>
    
</div>
</div>
</div>
</div>
</div>
