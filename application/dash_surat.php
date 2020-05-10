<script type="text/javascript"> // Tabel Surat Masuk --------------------------------------------------------------
var save_masuk_method; //for save method string
var table_masuk;
$(document).ready(function() {
    //datatables

// Data Table Surat Masuk --------------------------------------------------------------------------------------
    table = $('#table_masuk').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "rowReorder": {
            		"selector": "td:nth-child(2)"
			},
	    "responsive": true,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?=site_url('surat/ajax_list_masuk'); ?>",
            "type": "POST"

        },
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
    });

     //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    });
// End Data Table Surat Masuk --------------------------------------------------------------------------------------

// Tambah Data Table Surat Masuk --------------------------------------------------------------------------------------
    function add_masuk(){
        save_masuk_method = 'add';
        $('#form_masuk')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        
        $('[name="nomor"]').removeAttr('readonly', 'readonly');
    
        $('[name="tgl_terima"]').removeAttr('readonly', 'readonly');
        $('[name="tgl_surat"]').removeAttr('readonly', 'readonly');
        $('[name="tgl_input"]').removeAttr('readonly', 'readonly');
        $('[name="penerima"]').removeAttr('readonly', 'readonly');
        $('[name="hal"]').removeAttr('readonly', 'readonly');
        $('[name="agendaris"]').removeAttr('readonly', 'readonly');
        $('[name="status"]').removeAttr('readonly', 'readonly');
        $('[name="kepada"]').removeAttr('readonly', 'readonly');
        $('[name="alamat_pengirim"]').removeAttr('readonly', 'readonly');
        $('[name="pengirim"]').removeAttr('readonly', 'readonly');

        $('#modal_masuk').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add masuk'); // Set Title to Bootstrap modal title
    }
// End Tambah Data Table Surat Masuk --------------------------------------------------------------------------------------

// Edit Data Table Surat Masuk --------------------------------------------------------------------------------------
    function edit_masuk(id){
        save_masuk_method = 'update';
        $('#form_masuk')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('surat/ajax_edit_masuk/');?>" + id,
            beforeSend :function () { // swetalert ----------------------
                            swal({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                timer: 500,
                                onOpen: () => {
                                swal.showLoading()
                                }
                            })      
                            }, // Batas swetalert ------------------------
            type: "GET",
            enctype:"multipart/form-data",
            dataType: "JSON",
            success: function(data)
            {
            $('[name="id_tc_surat_masuk"]').val(data.id_tc_surat_masuk);
            $('[name="tgl_terima"]').val(data.tgl_terima);
            $('[name="tgl_surat"]').val(data.tgl_surat);
            $('[name="tgl_input"]').val(data.tgl_input);
            $('[name="penerima"]').val(data.penerima);
            $('[name="nomor"]').val(data.nomor);
            $('[name="hal"]').val(data.hal);
            $('[name="agendaris"]').val(data.agendaris);
            $('[name="status"]').val(data.status);
            $('[name="kepada"]').val(data.kepada);
            //    $('[name="keterangan"]').val(data.keterangan);
            $('[name="alamat_pengirim"]').val(data.alamat_pengirim);
            $('[name="pengirim"]').val(data.pengirim);
            $('[name="kd_unik"]').val(data.kd_unik);
            //    $('[name="url_scan"]').val(data.url_scan);
            
            $('[name="nomor"]').attr('readonly', 'readonly');
        
                $('[name="tgl_terima"]').removeAttr('readonly', 'readonly');
                $('[name="tgl_surat"]').removeAttr('readonly', 'readonly');
                $('[name="tgl_input"]').removeAttr('readonly', 'readonly');
                $('[name="penerima"]').removeAttr('readonly', 'readonly');
                $('[name="hal"]').removeAttr('readonly', 'readonly');
                $('[name="agendaris"]').removeAttr('readonly', 'readonly');
                $('[name="status"]').removeAttr('readonly', 'readonly');
                $('[name="kepada"]').removeAttr('readonly', 'readonly');
                $('[name="alamat_pengirim"]').removeAttr('readonly', 'readonly');
                $('[name="pengirim"]').removeAttr('readonly', 'readonly');

                $('#modal_masuk').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Masuk'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }
// End Edit Data Table Surat Masuk --------------------------------------------------------------------------------------

// Reload Data Table Surat Masuk --------------------------------------------------------------------------------------
    function reload_table_masuk()
    {
        $('#table_masuk').DataTable().ajax.reload();
    }
// End Reload Data Table Surat Masuk --------------------------------------------------------------------------------------

// Save Data Table Surat Masuk --------------------------------------------------------------------------------------
    function save_masuk()
        {
        $('#btnSave_masuk').text('saving...'); //change button text
        $('#btnSave_masuk').attr('disabled',true); //set button disable 
        var url;
        var form10 = $('#form_masuk')[0];
            // Create an FormData object 
            var data = new FormData(form10);

        if(save_masuk_method == 'add'){
            url ="<?php echo site_url('surat/ajax_add_masuk')?>";
        } else {
            url ="<?php echo site_url('surat/ajax_update_masuk'); ?>";
        }
        // ajax adding data to database
            $.ajax({
            url : url,
            type: "POST",
            enctype: 'multipart/form-data',
            data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
            dataType: "JSON",

            success: function(data)
            {
            if(data.status === false)//if success close modal and reload ajax table
                {
                    alert(data.kliru);
                }
                else
                {
                    // alert(data.kliru);
                    reload_table_masuk();
                    swal({
                        type: 'success',
                        title: 'Data Surat Masuk',
                        text: 'Anda Berhasil Memasukkan Surat Masuk'
                    })
                    $('#modal_masuk').modal('hide');
                    
                }
                $('#btnSave_masuk').text('save'); //change button text
                $('#btnSave_masuk').attr('disabled',false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown)
                {
                alert('Error adding / update data');
                $('#btnSave_masuk').text('save'); //change button text
                $('#btnSave_masuk').attr('disabled',false); //set button enable 
            }
        });
        }
// End Save Data Table Surat Masuk --------------------------------------------------------------------------------------

// Delete Data Table Surat Masuk --------------------------------------------------------------------------------------
    function delete_masuk(id){
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('surat/ajax_delete_masuk')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    swal({
                        type: 'success',
                        title: 'Data Surat Masuk',
                        text: 'Berhasil Dihapus'
                    })
                $('#modal_masuk').modal('hide');
                reload_table_masuk();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }

    function delete_masuk2(id) {
            window.location.href = "<?php echo site_url('surat/delete_masuk/');?>" + id;
        }

// End Delete Data Table Surat Masuk --------------------------------------------------------------------------------------