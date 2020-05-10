<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RSUW Sekretariatan | Dashboard</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url(); ?>assets/dist/img/favicon.ico" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Lighbook -->
    <link href="<?= base_url(); ?>assets/light/lightbox2-master/dist/css/lightbox.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/DataTables-1.10.20/css/dataTables.jqueryui.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/DataTables-1.10.20/css/dataTables.jqueryui.min.css">
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                // scrollY : '250px',
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdf',
                        orientation: 'potrait',
                        pageSize: 'A4',
                        text: 'pdf',
                        title: 'Sistem Pemantauan Tugas Akhir',
                        download: 'open'
                    },
                    'copy', 'csv', 'excel', 'print'
                ]
            });
        });
    </script>
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/Responsive-2.2.3/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/Buttons-1.6.1/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/datatables/Scroller-2.0.1/css/scroller.bootstrap4.min.css">
    <!-- Select 2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-select.css">

    <!-- <link href="<?= base_url(); ?>assets/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet"> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
        $user['dd_user'] = $this->db->get_where('dd_user', ['username' => $this->session->userdata('username')])->row_array(); ?>

        <?php $this->load->view('templates/topbar', $user); ?>
        <?php $this->load->view('templates/sidebar', $user); ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-image: url('<?= base_url('assets/dist/img/sidebar5.png') ?>')">

            <?php $this->load->view('templates/header', $user); ?>

            <?php echo $main_view; ?>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong><a href="#">RSUW Sekretariatan </a>&copy; 2019-2020 <a href="#">Nusamed Healthcare</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 4.0.0 Pro
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
    <!-- DataTables -->
    <!-- <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script> -->
    <!-- <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script> -->

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
    </script>

    <script src="<?= base_url(); ?>assets/datatables/DataTables-1.10.20/js/jquery.dataTables.js"></script>
    <script src="<?= base_url(); ?>assets/datatables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/datatables/DataTables-1.10.20/js/dataTables.jqueryui.min.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/datatables/DataTables-1.10.20/js/jquery.dataTables.js"></script> -->

    <script src="<?= base_url(); ?>assets/datatables/Responsive-2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/datatables/Buttons-1.6.1/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/datatables/Scroller-2.0.1/js/scroller.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/light/lightbox2-master/dist/js/lightbox.js"></script>
    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })
    </script>
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });



        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
                url: "<?= base_url('admin/changeaccess'); ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                }
            });

        });
    </script>


    <!-- Custom scripts for Sweetalert-->
    <script src="<?= base_url(); ?>assets/js/SweetAlert/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/SweetAlert/myscript.js"></script>
    <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/js/bootstrap-datepicker.min.js')?>"></script> -->

    <!--User -->

    <!--User -->
    <script type="text/javascript">
        // Tabel User ---------------------------------------------------
        var save_user_method; //for save method string
        var table_user;
        $(document).ready(function() {
            //datatables

            // Data Table User --------------------------------------------------------------------------------------
            table = $('#table_user').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('admin/ajax_list_user'); ?>",
                    "type": "POST"
                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
            });

            //datepicker
            //  $('.datepicker').datepicker({
            //         autoclose: true,
            //         format: "yyyy-mm-dd",
            //         todayHighlight: true,
            //         orientation: "top auto",
            //         todayBtn: true,
            //         todayHighlight: true,  
            //     });

            //set input/textarea/select event when change value, remove class error and remove text help block 
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table User --------------------------------------------------------------------------------------

        function changepassword(id) {
            window.location.href = "<?php echo site_url('user/changepassword/'); ?>" + id;
        }

        // Tambah Data Table User --------------------------------------------------------------------------------------
        function add_user() {
            save_method = 'add';
            $('#form_user')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_user').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add User'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table User --------------------------------------------------------------------------------------

        // Edit Data Table User --------------------------------------------------------------------------------------
        function edit_user(id) {
            save_method = 'update';
            $('#form_user')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('admin/ajax_edit_user/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                },
                //   data: {editnama:editnama,editalamat:editalamat,id:id}, // ambil datanya dari form yang ada di variabel

                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_dd_user"]').val(data.id_dd_user);
                    $('[name="name"]').val(data.name);
                    $('[name="username"]').val(data.username);
                    $('[name="role_id"]').val(data.role_id);
                    $('[name="id_active"]').val(data.id_active);

                    $('[name="username"]').attr('readonly', 'readonly');

                    $('#modal_user').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table User --------------------------------------------------------------------------------------

        // Reload Data Table User --------------------------------------------------------------------------------------
        function reload_table_user() {
            $('#table_user').DataTable().ajax.reload();
        }
        // End Reload Data Table User --------------------------------------------------------------------------------------

        // Save Data Table User --------------------------------------------------------------------------------------
        function save() {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable 
            var url;

            if (save_method == 'add') {
                url = "<?php echo site_url('admin/ajax_add_user') ?>";
            } else {
                url = "<?php echo site_url('admin/ajax_update_user'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------

                type: "POST",
                data: $('#form_user').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status) //if success close modal and reload ajax table
                    {
                        reload_table_user();
                        swal({
                            type: 'success',
                            title: 'Update User',
                            text: 'Anda Berhasil Mengubah Data User'
                        })
                        $('#modal_user').modal('hide');
                    } else {
                        for (var i = 0; i < data.inputerror.length; i++) {
                            $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        }
                    }
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table User --------------------------------------------------------------------------------------

        // Delete Data Table User --------------------------------------------------------------------------------------
        function delete_user(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('admin/ajax_delete_user') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Master jabatan',
                            text: 'Berhasil Dihapus'
                        })
                        $('#modal_user').modal('hide');
                        reload_table_user();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });
            }
        }
        // End Delete Data Table User --------------------------------------------------------------------------------------
    </script>


    <script type="text/javascript">
        // Tabel Surat Masuk --------------------------------------------------------------
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
                    "url": "<?= site_url('surat/ajax_list_masuk'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Surat Masuk --------------------------------------------------------------------------------------

        // Tambah Data Table Surat Masuk --------------------------------------------------------------------------------------
        function add_masuk() {
            save_masuk_method = 'add';
            $('#form_masuk')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            $('[name="no_surat"]').removeAttr('readonly', 'readonly');

            $('[name="penerima"]').removeAttr('readonly', 'readonly');
            $('[name="tgl_surat"]').removeAttr('readonly', 'readonly');
            $('[name="jenis_surat"]').removeAttr('readonly', 'readonly');
            $('[name="sur_dari"]').removeAttr('readonly', 'readonly');
            $('[name="perihal_surat"]').removeAttr('readonly', 'readonly');
            $('[name="agenda_surat"]').removeAttr('readonly', 'readonly');
            $('[name="kepada"]').removeAttr('readonly', 'readonly');
            $('[name="upload_surat"]').removeAttr('readonly', 'readonly');
            $('[name="status"]').removeAttr('readonly', 'readonly');
            $('[name="control"]').removeAttr('readonly', 'readonly');

            $('#modal_masuk').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add masuk'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Surat Masuk --------------------------------------------------------------------------------------

        // Edit Data Table Surat Masuk --------------------------------------------------------------------------------------
        function edit_masuk(id) {
            save_masuk_method = 'update';
            $('#form_masuk')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('surat/ajax_edit_masuk/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                enctype: "multipart/form-data",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_sur_masuk"]').val(data.id_sur_masuk);
                    $('[name="no_surat"]').val(data.no_surat);
                    $('[name="tgl_surat"]').val(data.tgl_surat);
                    $('[name="penerima"]').val(data.penerima);
                    $('[name="jenis_surat"]').val(data.jenis_surat);
                    $('[name="sur_dari"]').val(data.sur_dari);
                    $('[name="perihal_surat"]').val(data.perihal_surat);
                    $('[name="agenda_surat"]').val(data.agenda_surat);
                    $('[name="kepada"]').val(data.kepada);
                    $('[name="status"]').val(data.status);
                    $('[name="control"]').val(data.control);
                    $('[name="kd_unik"]').val(data.kd_unik);

                    $('[name="no_surat"]').attr('readonly', 'readonly');

                    $('[name="penerima"]').removeAttr('readonly', 'readonly');
                    $('[name="tgl_surat"]').removeAttr('readonly', 'readonly');
                    $('[name="jenis_surat"]').removeAttr('readonly', 'readonly');
                    $('[name="sur_dari"]').removeAttr('readonly', 'readonly');
                    $('[name="perihal_surat"]').removeAttr('readonly', 'readonly');
                    $('[name="agenda_surat"]').removeAttr('readonly', 'readonly');
                    $('[name="kepada"]').removeAttr('readonly', 'readonly');
                    $('[name="status"]').removeAttr('readonly', 'readonly');
                    $('[name="control"]').removeAttr('readonly', 'readonly');

                    $('#modal_masuk').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Masuk'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }

        // End Edit Data Table Surat Masuk --------------------------------------------------------------------------------------

        // Reload Data Table Surat Masuk --------------------------------------------------------------------------------------
        function reload_table_masuk() {
            $('#table_masuk').DataTable().ajax.reload();
        }
        // End Reload Data Table Surat Masuk --------------------------------------------------------------------------------------

        // Save Data Table Surat Masuk --------------------------------------------------------------------------------------
        function save_masuk() {
            $('#btnSave_masuk').text('saving...'); //change button text
            $('#btnSave_masuk').attr('disabled', true); //set button disable 
            var url;
            var form10 = $('#form_masuk')[0];
            // Create an FormData object 
            var data = new FormData(form10);

            if (save_masuk_method == 'add') {
                url = "<?php echo site_url('surat/ajax_add_masuk') ?>";
            } else {
                url = "<?php echo site_url('surat/ajax_update_masuk'); ?>";
            }
            // ajax adding data to database
            $.ajax({
                url: url,
                type: "POST",
                enctype: 'multipart/form-data',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                dataType: "JSON",

                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
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
                    $('#btnSave_masuk').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_masuk').text('save'); //change button text
                    $('#btnSave_masuk').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table Surat Masuk --------------------------------------------------------------------------------------

        // Delete Data Table Surat Masuk --------------------------------------------------------------------------------------
        function delete_masuk(id) {
            window.location.href = "<?php echo site_url('surat/delete_masuk/'); ?>" + id;
        }

        // End Delete Data Table Surat Masuk --------------------------------------------------------------------------------------

        // Detail & Print Data Table Surat Masuk --------------------------------------------------------------------------------------
        function detail(id) {
            window.location.href = "<?php echo site_url('surat/detail/'); ?>" + id;
        }

        function print(id) {
            window.location.href = "<?php echo site_url('surat/print_surmasuk/'); ?>" + id;
        }

        // End Detail Data Table Surat Masuk --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Surat Masuk (Disposisi) ------------------------------------------------------------------
        var save_disposisi_method; //for save method string
        var table_masuk;

        // Reload Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------
        function reload_table_masuk() {
            $('#table_masuk').DataTable().ajax.reload();
        }
        // End Reload Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------

        // Edit Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------
        function edit_disposisi(id) {
            save_disposisi_method = 'update';
            $('#form_disposisi')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('surat/ajax_edit_disposisi/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_sur_masuk"]').val(data.id_sur_masuk);
                    $('[name="id_disposisi"]').val(data.id_disposisi);
                    $('[name="no_surat"]').val(data.no_surat);
                    $('[name="tgl_terima"]').val(data.tgl_terima);
                    $('[name="ka_bag_aku"]').val(data.ka_bag_aku);
                    $('[name="ka_bag_yan"]').val(data.ka_bag_yan);
                    $('[name="pro_disposisi"]').val(data.pro_disposisi);
                    $('[name="catatan_ka_rs"]').val(data.catatan_ka_rs);


                    $('[name="catatan_ka_rs"]').removeAttr('readonly', 'readonly');
                    //    $('[name="nomor"]').attr('readonly', 'readonly');

                    $('#modal_disposisi').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Disposisi'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------

        // Save Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------
        function save_disposisi() {
            $('#btnSave_disposisi').text('saving...'); //change button text
            $('#btnSave_disposisi').attr('disabled', true); //set button disable 
            var url;

            if (save_disposisi_method == 'add') {
                url = "<?php echo site_url('surat/ajax_add_disposisi') ?>";
            } else {
                url = "<?php echo site_url('surat/ajax_update_disposisi'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_disposisi').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_masuk();
                        swal({
                            type: 'success',
                            title: 'Data Surat Masuk',
                            text: 'Anda Berhasil Memasukkan Surat Masuk'
                        })
                        $('#modal_disposisi').modal('hide');

                    }
                    $('#btnSave_disposisi').text('save'); //change button text
                    $('#btnSave_disposisi').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_disposisi').text('save'); //change button text
                    $('#btnSave_disposisi').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Edit Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Surat Masuk (Disposisi) ------------------------------------------------------------------
        var save_kabag_YAN_method; //for save method string
        var table_masuk;

        // Reload Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------
        function reload_table_masuk() {
            $('#table_masuk').DataTable().ajax.reload();
        }
        // End Reload Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------

        // Edit Data Surat Masuk (PARAF KABAG AKU) --------------------------------------------------------------------------------------
        function edit_kabag_Yan(id) {
            save_kabag_YAN_method = 'update';
            $('#form_kabag_Yan')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('surat/ajax_edit_kabag_Yan/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_sur_masuk"]').val(data.id_sur_masuk);
                    $('[name="no_surat"]').val(data.no_surat);
                    $('[name="tgl_terima"]').val(data.tgl_terima);
                    $('[name="ka_bag_yan"]').val(data.ka_bag_yan);
                    $('[name="catatan_surat"]').val(data.catatan_surat);
                    //    $('[name="nomor"]').attr('readonly', 'readonly');

                    $('#modal_kabag_Yan').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('PARAF KABAG YAN'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Surat Masuk (PARAF KABAG AKU) --------------------------------------------------------------------------------------

        // Save Data Surat Masuk (SAVE PARAF KABAG AKU) --------------------------------------------------------------------------------------
        function save_kabag_Yan() {
            $('#btnSave_kabag_Yan').text('saving...'); //change button text
            $('#btnSave_kabag_Yan').attr('disabled', true); //set button disable 
            var url;

            if (save_kabag_YAN_method == 'add') {
                url = "<?php echo site_url('surat/ajax_add_kabag_Yan') ?>";
            } else {
                url = "<?php echo site_url('surat/ajax_update_kabag_Yan'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_kabag_Yan').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_masuk();
                        swal({
                            type: 'success',
                            title: 'Data Surat Masuk',
                            text: 'Anda Berhasil Paraf Surat Masuk'
                        })
                        $('#modal_kabag_Yan').modal('hide');

                    }
                    $('#btnSave_kabag_Yan').text('save'); //change button text
                    $('#btnSave_kabag_Yan').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_kabag_Yan').text('save'); //change button text
                    $('#btnSave_kabag_Yan').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Edit Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Surat Masuk (Disposisi) ------------------------------------------------------------------
        var save_diterima_method; //for save method string
        var table_masuk;

        // Reload Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------
        function reload_table_masuk() {
            $('#table_masuk').DataTable().ajax.reload();
        }
        // End Reload Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------

        // Edit Data Surat Masuk (PARAF KABAG AKU) --------------------------------------------------------------------------------------
        function edit_diterima(id) {
            save_diterima_method = 'update';
            $('#form_diterima')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('surat/ajax_edit_diterima/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_sur_masuk"]').val(data.id_sur_masuk);
                    $('[name="no_surat"]').val(data.no_surat);
                    $('[name="tgl_terima"]').val(data.tgl_terima);
                    $('[name="pro_diterima"]').val(data.pro_diterima);
                    $('[name="catatan_ka_rs"]').val(data.catatan_ka_rs);
                    //    $('[name="nomor"]').attr('readonly', 'readonly');

                    $('#modal_diterima').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Disposisi diterima'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Surat Masuk (PARAF KABAG AKU) --------------------------------------------------------------------------------------

        // Save Data Surat Masuk (SAVE PARAF KABAG AKU) --------------------------------------------------------------------------------------
        function save_diterima() {
            $('#btnSave_diterima').text('saving...'); //change button text
            $('#btnSave_diterima').attr('disabled', true); //set button disable 
            var url;

            if (save_diterima_method == 'add') {
                url = "<?php echo site_url('surat/ajax_add_diterima') ?>";
            } else {
                url = "<?php echo site_url('surat/ajax_update_diterima'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_diterima').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_masuk();
                        swal({
                            type: 'success',
                            title: 'Data Surat Masuk',
                            text: 'Anda Berhasil Paraf Surat Masuk'
                        })
                        $('#modal_diterima').modal('hide');

                    }
                    $('#btnSave_diterima').text('save'); //change button text
                    $('#btnSave_diterima').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_diterima').text('save'); //change button text
                    $('#btnSave_diterima').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Edit Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Surat Masuk (Disposisi) ------------------------------------------------------------------
        var save_kabag_aku_method; //for save method string
        var table_masuk;

        // Reload Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------
        function reload_table_masuk() {
            $('#table_masuk').DataTable().ajax.reload();
        }
        // End Reload Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------

        // Edit Data Surat Masuk (PARAF KABAG AKU) --------------------------------------------------------------------------------------
        function edit_kabag_aku(id) {
            save_kabag_aku_method = 'update';
            $('#form_kabag_aku')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('surat/ajax_edit_kabag_aku/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_sur_masuk"]').val(data.id_sur_masuk);
                    $('[name="no_surat"]').val(data.no_surat);
                    $('[name="tgl_terima"]').val(data.tgl_terima);
                    $('[name="ka_bag_aku"]').val(data.ka_bag_aku);
                    $('[name="catatan_surat"]').val(data.catatan_surat);
                    //    $('[name="nomor"]').attr('readonly', 'readonly');

                    $('#modal_kabag_aku').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('PARAF KABAG AKU'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Surat Masuk (PARAF KABAG AKU) --------------------------------------------------------------------------------------

        // Save Data Surat Masuk (SAVE PARAF KABAG AKU) --------------------------------------------------------------------------------------
        function save_kabag_aku() {
            $('#btnSave_kabag_aku').text('saving...'); //change button text
            $('#btnSave_kabag_aku').attr('disabled', true); //set button disable 
            var url;

            if (save_kabag_aku_method == 'add') {
                url = "<?php echo site_url('surat/ajax_add_kabag_aku') ?>";
            } else {
                url = "<?php echo site_url('surat/ajax_update_kabag_aku'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_kabag_aku').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_masuk();
                        swal({
                            type: 'success',
                            title: 'Data Surat Masuk',
                            text: 'Anda Berhasil Paraf Surat Masuk'
                        })
                        $('#modal_kabag_aku').modal('hide');

                    }
                    $('#btnSave_kabag_aku').text('save'); //change button text
                    $('#btnSave_kabag_aku').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_kabag_aku').text('save'); //change button text
                    $('#btnSave_kabag_aku').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Edit Data Surat Masuk (Disposisi) --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Data tabel Surat Keluar ---------------------------------------------------------------
        var save_keluar_method; //for save method string
        var table_keluar;
        $(document).ready(function() {
            //datatables

            // Data Table Surat Keluar --------------------------------------------------------------------------------------   
            table = $('#table_keluar').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('surat/ajax_list_keluar'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Surat Keluar --------------------------------------------------------------------------------------

        // Tambah Data Table Surat Keluar -------------------------------------------------------------------------------------- 
        function add_keluar() {
            save_keluar_method = 'add';
            $('#form_keluar')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            $('[name="no_surat"]').removeAttr('readonly', 'readonly');
            $('[name="pembuat"]').removeAttr('readonly', 'readonly');

            $('#modal_keluar').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add keluar'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Surat Keluar -------------------------------------------------------------------------------------- 

        // Edit Data Table Surat Keluar -------------------------------------------------------------------------------------- 
        function edit_keluar(id) {
            save_keluar_method = 'update';
            $('#form_keluar')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('surat/ajax_edit_keluar/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                enctype: 'multipart/form-data',
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_sur_keluar"]').val(data.id_sur_keluar);
                    $('[name="no_surat"]').val(data.no_surat);
                    $('[name="tgl_surat"]').val(data.tgl_surat);
                    $('[name="jenis_surat"]').val(data.jenis_surat);
                    $('[name="perihal_surat"]').val(data.perihal_surat);
                    $('[name="status_surat"]').val(data.status_surat);
                    $('[name="pembuat"]').val(data.pembuat);
                    $('[name="kepada"]').val(data.kepada);
                    $('[name="control"]').val(data.control);

                    $('[name="no_surat"]').attr('readonly', 'readonly');
                    $('[name="pembuat"]').attr('readonly', 'readonly');

                    $('#modal_keluar').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Keluar'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Surat Keluar -------------------------------------------------------------------------------------- 

        // Reload Data Table Surat Keluar --------------------------------------------------------------------------------------
        function reload_table_keluar() {
            $('#table_keluar').DataTable().ajax.reload();
        }
        // End Reload Data Table Surat Keluar --------------------------------------------------------------------------------------

        // Save Data Table Surat Keluar --------------------------------------------------------------------------------------
        function save_keluar() {
            $('#btnSave_keluar').text('saving...'); //change button text
            $('#btnSave_keluar').attr('disabled', true); //set button disable 
            var url;
            var form11 = $('#form_keluar')[0];
            // Create an FormData object 
            var data = new FormData(form11);

            if (save_keluar_method == 'add') {
                url = "<?php echo site_url('surat/ajax_add_keluar') ?>";
            } else {
                url = "<?php echo site_url('surat/ajax_update_keluar'); ?>";
            }
            // ajax adding data to database
            $.ajax({
                url: url,
                type: "POST",
                enctype: 'multipart/form-data',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                dataType: "JSON",

                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        // alert(data.kliru);
                        reload_table_keluar();
                        swal({
                            type: 'success',
                            title: 'Data Surat Keluar',
                            text: 'Anda Berhasil Memasukkan Surat Keluar'
                        })
                        $('#modal_keluar').modal('hide');

                    }
                    $('#btnSave_keluar').text('save'); //change button text
                    $('#btnSave_keluar').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_keluar').text('save'); //change button text
                    $('#btnSave_keluar').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table Surat Keluar --------------------------------------------------------------------------------------

        // Delete Data Table Surat Keluar --------------------------------------------------------------------------------------
        function delete_keluar(id) {
            window.location.href = "<?php echo site_url('surat/delete_keluar/'); ?>" + id;
        }
        // End Delete Data Table Surat Keluar --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Data Tabel Menu Management ------------------------------------------------------------
        var save_menu_method; //for save method string
        var table_menu;
        $(document).ready(function() {
            //datatables

            // Data Table Menu Management --------------------------------------------------------------------------------------
            table = $('#table_menu').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('menu/ajax_list_menu'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Menu Management --------------------------------------------------------------------------------------

        // Tambah Data Table Menu Management --------------------------------------------------------------------------------------
        function add_menu() {
            save_menu_method = 'add';
            $('#form_menu')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_menu').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Menu'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Menu Management --------------------------------------------------------------------------------------

        // Edit Data Table Menu Management --------------------------------------------------------------------------------------
        function edit_menu(id) {
            save_menu_method = 'update';
            $('#form_menu')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('menu/ajax_edit_menu/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id);
                    $('[name="menu"]').val(data.menu);

                    //  $('[name="keterangan"]').val(data.keterangan);             
                    $('#modal_menu').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Menu'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Menu Management --------------------------------------------------------------------------------------

        // Reload Data Table Menu Management --------------------------------------------------------------------------------------
        function reload_table_menu() {
            $('#table_menu').DataTable().ajax.reload();
        }
        // End Reload Data Table Menu Management --------------------------------------------------------------------------------------

        // Save Data Table Menu Management --------------------------------------------------------------------------------------
        function save_menu() {
            $('#btnSave_menu').text('saving...'); //change button text
            $('#btnSave_menu').attr('disabled', true); //set button disable 
            var url;

            if (save_menu_method == 'add') {
                url = "<?php echo site_url('menu/ajax_add_menu') ?>";
            } else {
                url = "<?php echo site_url('menu/ajax_update_menu'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_menu').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_menu();
                        swal({
                            type: 'success',
                            title: 'Data User Menu',
                            text: 'Anda Berhasil Memasukkan User Menu'
                        })
                        $('#modal_menu').modal('hide');
                    }
                    $('#btnSave_menu').text('save'); //change button text
                    $('#btnSave_menu').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_menu').text('save'); //change button text
                    $('#btnSave_menu').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table Menu Management --------------------------------------------------------------------------------------

        // Delete Data Table Menu Management --------------------------------------------------------------------------------------
        function delete_menu(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('menu/ajax_delete_menu') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Master Menu',
                            text: 'Berhasil Dihapus'
                        })
                        $('#modal_menu').modal('hide');
                        reload_table_menu();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }
        // End Delete Data Table Menu Management --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Data Tabel SubMenu Management ------------------------------------------------------------
        var save_submenu_method; //for save method string
        var table_submenu;
        $(document).ready(function() {
            //datatables

            // Data Table SubMenu Management --------------------------------------------------------------------------------------
            table = $('#table_submenu').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('menu/ajax_list_submenu'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table SubMenu Management --------------------------------------------------------------------------------------

        // Tambah Data Table SubMenu Management --------------------------------------------------------------------------------------
        function add_submenu() {
            save_submenu_method = 'add';
            $('#form_submenu')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_submenu').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add SubMenu'); // Set Title to Bootstrap modal title
        }

        // End Tambah Data Table SubMenu Management --------------------------------------------------------------------------------------

        // Edit Data Table SubMenu Management --------------------------------------------------------------------------------------
        function edit_submenu(id) {
            save_submenu_method = 'update';
            $('#form_submenu')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('menu/ajax_edit_submenu/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id);
                    $('[name="title"]').val(data.title);
                    $('[name="menu_id"]').val(data.menu_id);
                    $('[name="url"]').val(data.url);
                    $('[name="icon"]').val(data.icon);
                    $('[name="id_active"]').val(data.id_active);

                    //  $('[name="keterangan"]').val(data.keterangan);             
                    $('#modal_submenu').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit SubMenu'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table SubMenu Management --------------------------------------------------------------------------------------

        // Reload Data Table SubMenu Management --------------------------------------------------------------------------------------
        function reload_table_submenu() {
            $('#table_submenu').DataTable().ajax.reload();
        }
        // End Reload Data Table SubMenu Management --------------------------------------------------------------------------------------

        // Save Data Table SubMenu Management --------------------------------------------------------------------------------------
        function save_submenu() {
            $('#btnSave_submenu').text('saving...'); //change button text
            $('#btnSave_submenu').attr('disabled', true); //set button disable 
            var url;

            if (save_submenu_method == 'add') {
                url = "<?php echo site_url('menu/ajax_add_submenu') ?>";
            } else {
                url = "<?php echo site_url('menu/ajax_update_submenu'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------

                type: "POST",
                data: $('#form_submenu').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_submenu();
                        swal({
                            type: 'success',
                            title: 'Data SubMenu',
                            text: 'Anda Berhasil Memasukkan Data SubMenu'
                        })
                        $('#modal_submenu').modal('hide');

                    }
                    $('#btnSave_submenu').text('save'); //change button text
                    $('#btnSave_submenu').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_submenu').text('save'); //change button text
                    $('#btnSave_submenu').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table SubMenu Management --------------------------------------------------------------------------------------

        // Delete Data Table SubMenu Management --------------------------------------------------------------------------------------
        function delete_submenu(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('menu/ajax_delete_submenu') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data SubMenu',
                            text: 'Berhasil Dihapus'
                        })
                        $('#modal_submenu').modal('hide');
                        reload_table_submenu();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });
            }
        }
        // End Delete Data Table SubMenu Management --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Data Tabel Role ----------------------------------------------------------------------
        var save_role_method; //for save method string
        var table_role;
        $(document).ready(function() {
            //datatables
            // Data Table Role --------------------------------------------------------------------------------------        
            table = $('#table_role').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('admin/ajax_list_role'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Role --------------------------------------------------------------------------------------        

        // Tambah Data Table Role --------------------------------------------------------------------------------------        
        function add_role() {
            save_role_method = 'add';
            $('#form_role')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_role').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Role'); // Set Title to Bootstrap modal title
        }
        // Edit Tambah Data Table Role --------------------------------------------------------------------------------------        

        // Edit Data Table Role --------------------------------------------------------------------------------------        
        function edit_role(id) {
            save_role_method = 'update';
            $('#form_role')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('admin/ajax_edit_role/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id);
                    $('[name="role"]').val(data.role);
                    $('[name="n_menu"]').val(data.n_menu);

                    //  $('[name="keterangan"]').val(data.keterangan);             
                    $('#modal_role').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Role'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Role --------------------------------------------------------------------------------------        

        // Reload Data Table Role --------------------------------------------------------------------------------------        
        function reload_table_role() {
            $('#table_role').DataTable().ajax.reload();
        }
        // End Reload Data Table Role --------------------------------------------------------------------------------------        

        // Save Data Table Role --------------------------------------------------------------------------------------        
        function save_role() {
            $('#btnSave_role').text('saving...'); //change button text
            $('#btnSave_role').attr('disabled', true); //set button disable 
            var url;

            if (save_role_method == 'add') {
                url = "<?php echo site_url('admin/ajax_add_role') ?>";
            } else {
                url = "<?php echo site_url('admin/ajax_update_role'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_role').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_role();
                        swal({
                            type: 'success',
                            title: 'Data User Role',
                            text: 'Anda Berhasil Memasukkan Data Role'
                        })
                        $('#modal_role').modal('hide');
                    }
                    $('#btnSave_role').text('save'); //change button text
                    $('#btnSave_role').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_role').text('save'); //change button text
                    $('#btnSave_role').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table Role --------------------------------------------------------------------------------------        

        // Delete Data Table Role --------------------------------------------------------------------------------------        

        function delete_role(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('admin/ajax_delete_role') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Role',
                            text: 'Berhasil Dihapus'
                        })
                        $('#modal_role').modal('hide');
                        reload_table_role();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });
            }
        }

        // End Delete Data Table Role --------------------------------------------------------------------------------------        
    </script>

    <script type="text/javascript">
        var save_access_method; //for save method string
        var table_access;
        $(document).ready(function() {
            //datatables
            // Data Table Access --------------------------------------------------------------------------------------            
            table = $('#table_access').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('admin/ajax_list_access'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Access --------------------------------------------------------------------------------------            

        // Edit Data Table Access --------------------------------------------------------------------------------------            
        function edit_access(id) {
            save_access_method = 'update';
            $('#form_access')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('admin/ajax_edit_access/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id"]').val(data.id);
                    $('[name="access"]').val(data.access);


                    $('#modal_access').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Access'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }

        // End Edit Data Table Access --------------------------------------------------------------------------------------            

        // Reload Data Table Access --------------------------------------------------------------------------------------            
        function reload_table_access() {
            $('#table_access').DataTable().ajax.reload();
        }
        // End Reload Data Table Access --------------------------------------------------------------------------------------            

        // Save Data Table Access --------------------------------------------------------------------------------------            
        function save_access() {
            $('#btnSave_access').text('saving...'); //change button text
            $('#btnSave_access').attr('disabled', true); //set button disable 
            var url;

            if (save_access_method == 'add') {
                url = "<?php echo site_url('admin/ajax_add_access') ?>";
            } else {
                url = "<?php echo site_url('admin/ajax_update_access'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_access').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_access();
                        swal({
                            type: 'success',
                            title: 'Data User Role',
                            text: 'Anda Berhasil Memasukkan Data Access'
                        })
                        $('#modal_access').modal('hide');
                    }
                    $('#btnSave_access').text('save'); //change button text
                    $('#btnSave_access').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_access').text('save'); //change button text
                    $('#btnSave_access').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table Access --------------------------------------------------------------------------------------            

        // Delete Data Table Access --------------------------------------------------------------------------------------            
        function delete_access(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('admin/ajax_delete_access') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Access',
                            text: 'Berhasil Dihapus'
                        })
                        $('#modal_access').modal('hide');
                        reload_table_access();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });
            }
        }
        // End Delete Data Table Access --------------------------------------------------------------------------------------            
    </script>

    <script type="text/javascript">
        // Data Tabel Master Client ------------------------------------------------------------
        var save_client_method; //for save method string
        var table_client;
        $(document).ready(function() {
            //datatables

            // Data Table Master client --------------------------------------------------------------------------------------
            table = $('#table_client').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('master/ajax_list_client'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Master client --------------------------------------------------------------------------------------

        // Tambah Data Table Master client --------------------------------------------------------------------------------------
        function add_client() {
            save_client_method = 'add';
            $('#form_client')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_client').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Client'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Master client --------------------------------------------------------------------------------------

        // Edit Data Table Master client --------------------------------------------------------------------------------------
        function edit_client(id) {
            save_client_method = 'update';
            $('#form_client')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('master/ajax_edit_client/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_mt_client"]').val(data.id_mt_client);
                    $('[name="nm_persero"]').val(data.nm_persero);
                    $('[name="alamat_persero"]').val(data.alamat_persero);
                    $('[name="no_telpon_client"]').val(data.no_telpon_client);

                    $('#modal_client').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Client'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Master Client --------------------------------------------------------------------------------------

        // Reload Data Table Master Client --------------------------------------------------------------------------------------
        function reload_table_client() {
            $('#table_client').DataTable().ajax.reload();
        }
        // End Reload Data Table Master Client --------------------------------------------------------------------------------------

        // Save Data Table Master Client --------------------------------------------------------------------------------------
        function save_client() {
            $('#btnSave_client').text('saving...'); //change button text
            $('#btnSave_client').attr('disabled', true); //set button disable 
            var url;

            if (save_client_method == 'add') {
                url = "<?php echo site_url('master/ajax_add_client') ?>";
            } else {
                url = "<?php echo site_url('master/ajax_update_client'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_client').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_client();
                        swal({
                            type: 'success',
                            title: 'Data Master Client',
                            text: 'Anda Berhasil Memasukkan Master Client'
                        })
                        $('#modal_client').modal('hide');
                    }
                    $('#btnSave_client').text('save'); //change button text
                    $('#btnSave_client').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_client').text('save'); //change button text
                    $('#btnSave_client').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table Master Client --------------------------------------------------------------------------------------

        // Delete Data Table Master Client --------------------------------------------------------------------------------------
        function delete_client(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('master/ajax_delete_client') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Master Client',
                            text: 'Berhasil Dihapus'
                        })
                        $('#modal_client').modal('hide');
                        reload_table_client();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }
        // End Delete Data Table Master Client --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Data Tabel Master Karyawan ------------------------------------------------------------
        var save_karyawan_method; //for save method string
        var table_karyawan;
        $(document).ready(function() {
            //datatables

            // Data Table Master karyawan --------------------------------------------------------------------------------------
            table = $('#table_karyawan').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('master/ajax_list_karyawan'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Master karyawan --------------------------------------------------------------------------------------

        // Tambah Data Table Master karyawan --------------------------------------------------------------------------------------
        function add_karyawan() {
            save_karyawan_method = 'add';
            $('#form_karyawan')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('[name="no_induk"]').removeAttr('readonly', 'readonly');
            $('#modal_karyawan').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add karyawan'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Master karyawan --------------------------------------------------------------------------------------

        // Edit Data Table Master karyawan --------------------------------------------------------------------------------------
        function edit_karyawan(id) {
            save_karyawan_method = 'update';
            $('#form_karyawan')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('master/ajax_edit_karyawan/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {

                    // $('[name="id_mt_karyawan"]').val(data.id_mt_karyawan);
                    $('[name="no_induk"]').val(data.no_induk);
                    $('[name="nama_pegawai"]').val(data.nama_pegawai);
                    $('[name="kode_jabatan"]').val(data.kode_jabatan);
                    $('[name="status"]').val(data.status);
                    $('[name="alamat"]').val(data.alamat);
                    $('[name="no_hp"]').val(data.no_hp);
                    $('[name="email"]').val(data.email);

                    $('[name="no_induk"]').attr('readonly', 'readonly');

                    $('#modal_karyawan').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit karyawan'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Master karyawan --------------------------------------------------------------------------------------

        // Reload Data Table Master karyawan --------------------------------------------------------------------------------------
        function reload_table_karyawan() {
            $('#table_karyawan').DataTable().ajax.reload();
        }
        // End Reload Data Table Master karyawan --------------------------------------------------------------------------------------

        // Save Data Table Master karyawan --------------------------------------------------------------------------------------
        function save_karyawan() {
            $('#btnSave_karyawan').text('saving...'); //change button text
            $('#btnSave_karyawan').attr('disabled', true); //set button disable 
            var url;

            if (save_karyawan_method == 'add') {
                url = "<?php echo site_url('master/ajax_add_karyawan') ?>";
            } else {
                url = "<?php echo site_url('master/ajax_update_karyawan'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_karyawan').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_karyawan();
                        swal({
                            type: 'success',
                            title: 'Data Master karyawan',
                            text: 'Anda Berhasil Memasukkan Master karyawan'
                        })
                        $('#modal_karyawan').modal('hide');
                    }
                    $('#btnSave_karyawan').text('save'); //change button text
                    $('#btnSave_karyawan').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_karyawan').text('save'); //change button text
                    $('#btnSave_karyawan').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table Master karyawan --------------------------------------------------------------------------------------

        // Delete Data Table Master karyawan --------------------------------------------------------------------------------------
        function delete_karyawan(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('master/ajax_delete_karyawan') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Master Karyawan',
                            text: 'Berhasil Dihapus'
                        })
                        $('#modal_karyawan').modal('hide');
                        reload_table_karyawan();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }
        // End Delete Data Table Master karyawan --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Data Tabel Master Jabatan ------------------------------------------------------------
        var save_jabatan_method; //for save method string
        var table_jabatan;
        $(document).ready(function() {
            //datatables

            // Data Table Master jabatan --------------------------------------------------------------------------------------
            table = $('#table_jabatan').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('master/ajax_list_jabatan'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Master jabatan --------------------------------------------------------------------------------------

        // Tambah Data Table Master jabatan --------------------------------------------------------------------------------------
        function add_jabatan() {
            save_jabatan_method = 'add';
            $('#form_jabatan')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('[name="kode_jabatan"]').removeAttr('readonly', 'readonly');
            $('#modal_jabatan').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Jabatan'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Master jabatan --------------------------------------------------------------------------------------

        // Edit Data Table Master jabatan --------------------------------------------------------------------------------------
        function edit_jabatan(id) {
            save_jabatan_method = 'update';
            $('#form_jabatan')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('master/ajax_edit_jabatan/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="kode_jabatan"]').val(data.kode_jabatan);
                    $('[name="nama_jabatan"]').val(data.nama_jabatan);

                    $('[name="kode_jabatan"]').attr('readonly', 'readonly');

                    $('#modal_jabatan').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Jabatan'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Master jabatan --------------------------------------------------------------------------------------

        // Reload Data Table Master jabatan --------------------------------------------------------------------------------------
        function reload_table_jabatan() {
            $('#table_jabatan').DataTable().ajax.reload();
        }
        // End Reload Data Table Master jabatan --------------------------------------------------------------------------------------

        // Save Data Table Master jabatan --------------------------------------------------------------------------------------
        function save_jabatan() {
            $('#btnSave_jabatan').text('saving...'); //change button text
            $('#btnSave_jabatan').attr('disabled', true); //set button disable 
            var url;

            if (save_jabatan_method == 'add') {
                url = "<?php echo site_url('master/ajax_add_jabatan') ?>";
            } else {
                url = "<?php echo site_url('master/ajax_update_jabatan'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_jabatan').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_jabatan();
                        swal({
                            type: 'success',
                            title: 'Data Master jabatan',
                            text: 'Anda Berhasil Memasukkan Master jabatan'
                        })
                        $('#modal_jabatan').modal('hide');
                    }
                    $('#btnSave_jabatan').text('save'); //change button text
                    $('#btnSave_jabatan').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_jabatan').text('save'); //change button text
                    $('#btnSave_jabatan').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table Master jabatan --------------------------------------------------------------------------------------

        // Delete Data Table Master jabatan --------------------------------------------------------------------------------------
        function delete_jabatan(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('master/ajax_delete_jabatan') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Master jabatan',
                            text: 'Berhasil Dihapus'
                        })
                        $('#modal_jabatan').modal('hide');
                        reload_table_jabatan();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }

        // End Delete Data Table Master jabatan --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Tabel Master Kota --------------------------------------------------------------
        var save_kota_method; //for save method string
        var table_kota;
        $(document).ready(function() {
            //datatables

            // Data Table Master Kota --------------------------------------------------------------------------------------
            table = $('#table_kota').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('master/ajax_list_kota'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Master Kota --------------------------------------------------------------------------------------

        // Tambah Data Table master Kota --------------------------------------------------------------------------------------
        function add_kota() {
            save_kota_method = 'add';
            $('#form_kota')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            $('[name="kd_kota"]').removeAttr('readonly', 'readonly');

            $('#modal_kota').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Master Kota'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Master Kota --------------------------------------------------------------------------------------

        // Edit Data Table Master Kota --------------------------------------------------------------------------------------
        function edit_kota(id) {
            save_kota_method = 'update';
            $('#form_kota')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('master/ajax_edit_kota/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                enctype: "multipart/form-data",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_dc_kota"]').val(data.id_dc_kota);
                    $('[name="kd_kota"]').val(data.kd_kota);
                    $('[name="nama_kota"]').val(data.nama_kota);
                    $('[name="id_dc_propinsi"]').val(data.id_dc_propinsi);
                    $('[name="id_dc_negara"]').val(data.id_dc_negara);

                    $('[name="kd_kota"]').attr('readonly', 'readonly');

                    $('#modal_kota').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Master Kota'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Master Kota --------------------------------------------------------------------------------------

        // Reload Data Table Master Kota --------------------------------------------------------------------------------------
        function reload_table_kota() {
            $('#table_kota').DataTable().ajax.reload();
        }
        // End Reload Data Table Master Kota --------------------------------------------------------------------------------------

        // Save Data Table Master Kota --------------------------------------------------------------------------------------
        function save_kota() {
            $('#btnSave_kota').text('saving...'); //change button text
            $('#btnSave_kota').attr('disabled', true); //set button disable 
            var url;

            if (save_kota_method == 'add') {
                url = "<?php echo site_url('master/ajax_add_kota') ?>";
            } else {
                url = "<?php echo site_url('master/ajax_update_kota'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_kota').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_kota();
                        swal({
                            type: 'success',
                            title: 'Data Master kota',
                            text: 'Anda Berhasil Memasukkan Master kota'
                        })
                        $('#modal_kota').modal('hide');
                    }
                    $('#btnSave_kota').text('save'); //change button text
                    $('#btnSave_kota').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_kota').text('save'); //change button text
                    $('#btnSave_kota').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table Master Kota --------------------------------------------------------------------------------------

        // Delete Data Table Master Kota --------------------------------------------------------------------------------------
        function delete_kota(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('master/ajax_delete_kota') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Master Kota',
                            text: 'Berhasil Dihapus'
                        })
                        $('#modal_kota').modal('hide');
                        reload_table_kota();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }

        // End Delete Data Table Surat Masuk --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Tabel Master Propinsi --------------------------------------------------------------
        var save_propinsi_method; //for save method string
        var table_propinsi;
        $(document).ready(function() {
            //datatables

            // Data Table Master propinsi --------------------------------------------------------------------------------------
            table = $('#table_propinsi').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('master/ajax_list_propinsi'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Master propinsi --------------------------------------------------------------------------------------

        // Tambah Data Table master propinsi --------------------------------------------------------------------------------------
        function add_propinsi() {
            save_propinsi_method = 'add';
            $('#form_propinsi')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            // $('[name="kd_kota"]').removeAttr('readonly', 'readonly');

            $('#modal_propinsi').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Propinsi'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Master Propinsi --------------------------------------------------------------------------------------

        // Edit Data Table Master Propinsi --------------------------------------------------------------------------------------
        function edit_propinsi(id) {
            save_propinsi_method = 'update';
            $('#form_propinsi')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('master/ajax_edit_propinsi/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                enctype: "multipart/form-data",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_dc_propinsi"]').val(data.id_dc_propinsi);
                    $('[name="nama_propinsi"]').val(data.nama_propinsi);
                    $('[name="id_dc_negara"]').val(data.id_dc_negara);

                    $('#modal_propinsi').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Master Propinsi'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Master Propinsi --------------------------------------------------------------------------------------

        // Reload Data Table Master Propinsi --------------------------------------------------------------------------------------
        function reload_table_propinsi() {
            $('#table_propinsi').DataTable().ajax.reload();
        }
        // End Reload Data Table Master Kota --------------------------------------------------------------------------------------

        // Save Data Table Master Kota --------------------------------------------------------------------------------------
        function save_propinsi() {
            $('#btnSave_propinsi').text('saving...'); //change button text
            $('#btnSave_propinsi').attr('disabled', true); //set button disable 
            var url;

            if (save_propinsi_method == 'add') {
                url = "<?php echo site_url('master/ajax_add_propinsi') ?>";
            } else {
                url = "<?php echo site_url('master/ajax_update_propinsi'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_propinsi').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_propinsi();
                        swal({
                            type: 'success',
                            title: 'Data Master Propinsi',
                            text: 'Anda Berhasil Memasukkan Master Propinsi'
                        })
                        $('#modal_propinsi').modal('hide');
                    }
                    $('#btnSave_propinsi').text('save'); //change button text
                    $('#btnSave_propinsi').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_propinsi').text('save'); //change button text
                    $('#btnSave_propinsi').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table Master Propinsi --------------------------------------------------------------------------------------

        // Delete Data Table Master Propinsi --------------------------------------------------------------------------------------
        function delete_propinsi(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('master/ajax_delete_propinsi') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Master Propinsi',
                            text: 'Berhasil Dihapus'
                        })
                        $('#modal_propinsi').modal('hide');
                        reload_table_propinsi();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }

        // End Delete Data Table Surat Propinsi --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Tabel Master Negara --------------------------------------------------------------
        var save_negara_method; //for save method string
        var table_negara;
        $(document).ready(function() {
            //datatables

            // Data Table Master negara --------------------------------------------------------------------------------------
            table = $('#table_negara').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('master/ajax_list_negara'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Master negara --------------------------------------------------------------------------------------

        // Tambah Data Table master negara --------------------------------------------------------------------------------------
        function add_negara() {
            save_negara_method = 'add';
            $('#form_negara')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            // $('[name="kd_kota"]').removeAttr('readonly', 'readonly');

            $('#modal_negara').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Negara'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Master Negara --------------------------------------------------------------------------------------

        // Edit Data Table Master Negara --------------------------------------------------------------------------------------
        function edit_negara(id) {
            save_negara_method = 'update';
            $('#form_negara')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('master/ajax_edit_negara/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                enctype: "multipart/form-data",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_dc_negara"]').val(data.id_dc_negara);
                    $('[name="inisial_negara"]').val(data.inisial_negara);
                    $('[name="nama_negara"]').val(data.nama_negara);

                    $('#modal_negara').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Master Negara'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Master Negara --------------------------------------------------------------------------------------

        // Reload Data Table Master Negara --------------------------------------------------------------------------------------
        function reload_table_negara() {
            $('#table_negara').DataTable().ajax.reload();
        }
        // End Reload Data Table Master Negara --------------------------------------------------------------------------------------

        // Save Data Table Master Negara --------------------------------------------------------------------------------------
        function save_negara() {
            $('#btnSave_negara').text('saving...'); //change button text
            $('#btnSave_negara').attr('disabled', true); //set button disable 
            var url;

            if (save_negara_method == 'add') {
                url = "<?php echo site_url('master/ajax_add_negara') ?>";
            } else {
                url = "<?php echo site_url('master/ajax_update_negara'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_negara').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_negara();
                        swal({
                            type: 'success',
                            title: 'Data Master Negara',
                            text: 'Anda Berhasil Memasukkan Master Negara'
                        })
                        $('#modal_negara').modal('hide');
                    }
                    $('#btnSave_negara').text('save'); //change button text
                    $('#btnSave_negara').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_negara').text('save'); //change button text
                    $('#btnSave_negara').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table Master Negara --------------------------------------------------------------------------------------

        // Delete Data Table Master Negara --------------------------------------------------------------------------------------
        function delete_negara(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('master/ajax_delete_negara') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Master Negara',
                            text: 'Berhasil Dihapus'
                        })
                        $('#modal_negara').modal('hide');
                        reload_table_negara();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }

        // End Delete Data Table View Diklat --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Tabel View Diklat --------------------------------------------------------------
        var save_diklat_method; //for save method string
        var table_diklat;
        $(document).ready(function() {
            $('.bootstrap-select').selectpicker();
            //datatables

            // Data Table View Diklat --------------------------------------------------------------------------------------
            table = $('#table_diklat').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('diklat/ajax_list_diklat'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table View Diklat --------------------------------------------------------------------------------------

        // Tambah Data Table View Diklat --------------------------------------------------------------------------------------
        function add_diklat() {
            save_diklat_method = 'add';
            $('#form_diklat')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            // $('[name="kd_kota"]').removeAttr('readonly', 'readonly');

            $('#modal_diklat').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Diklat'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table View Diklat --------------------------------------------------------------------------------------

        // Edit Data Table View Diklat --------------------------------------------------------------------------------------
        function edit_diklat(id) {
            save_diklat_method = 'update';
            $('#form_diklat')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('diklat/ajax_edit_diklat/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                enctype: "multipart/form-data",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_diklat"]').val(data.id_diklat);
                    $('[name="nom_surat"]').val(data.nom_surat);
                    $('[name="kategori"]').val(data.kategori);
                    $('[name="perihal"]').val(data.perihal);
                    $('[name="instansi"]').val(data.instansi);
                    $('[name="agenda"]').val(data.agenda);
                    $('[name="tgl_berangkat"]').val(data.tgl_berangkat);
                    $('[name="tgl_kembali"]').val(data.tgl_kembali);
                    $('[name="total_waktu"]').val(data.total_waktu);
                    $('[name="ditugaskan"]').val(data.ditugaskan);
                    $('[name="up_surat"]').val(data.up_surat);
                    $('[name="up_bukti_tf"]').val(data.up_bukti_tf);
                    $('[name="up_surat_pengajuan"]').val(data.up_surat_pengajuan);
                    $('[name="up_surat_tugas"]').val(data.up_surat_tugas);
                    $('[name="up_laporan"]').val(data.up_laporan);


                    $('#modal_diklat').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit View Diklat'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table View Diklat --------------------------------------------------------------------------------------

        // Reload Data Table View Diklat --------------------------------------------------------------------------------------
        function reload_table_diklat() {
            $('#table_diklat').DataTable().ajax.reload();
        }
        // End Reload Data Table View Diklat --------------------------------------------------------------------------------------

        // Save Data Table View Diklat --------------------------------------------------------------------------------------
        function save_diklat() {
            $('#btnSave_diklat').text('saving...'); //change button text
            $('#btnSave_diklat').attr('disabled', true); //set button disable 
            var url;

            if (save_diklat_method == 'add') {
                url = "<?php echo site_url('diklat/ajax_add_diklat') ?>";
            } else {
                url = "<?php echo site_url('diklat/ajax_update_diklat'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_diklat').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_diklat();
                        swal({
                            type: 'success',
                            title: 'Data View Diklat',
                            text: 'Anda Berhasil Memasukkan View Diklat'
                        })
                        $('#modal_diklat').modal('hide');
                    }
                    $('#btnSave_diklat').text('save'); //change button text
                    $('#btnSave_diklat').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_diklat').text('save'); //change button text
                    $('#btnSave_diklat').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data Table View Diklat --------------------------------------------------------------------------------------

        // Delete Data Table View Diklat --------------------------------------------------------------------------------------
        function delete_diklat(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('diklat/ajax_delete_diklat') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data View Diklat',
                            text: 'Berhasil Dihapus'
                        })
                        $('#modal_diklat').modal('hide');
                        reload_table_diklat();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }

        // End Delete Data Table View Diklat --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Data Tabel Pendaftaran Pasien ------------------------------------------------------------
        var save_daftar_method; //for save method string
        var table_daftar;
        $(document).ready(function() {
            //datatables

            // Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
            table = $('#table_daftar').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('covid/ajax_list_daftar'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Tambah Data Table Pendaftaran Pasien--------------------------------------------------------------------------------------
        function add_daftar() {
            save_daftar_method = 'add';
            $('#form_daftar')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            $('[name="no_rm"]').removeAttr('readonly', 'readonly');

            $('#modal_daftar').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Daftar Pasien'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Edit Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
        function edit_daftar(id) {
            save_daftar_method = 'update';
            $('#form_daftar')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('covid/ajax_edit_daftar/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_pasien"]').val(data.id_pasien);
                    $('[name="no_rm"]').val(data.no_rm);
                    $('[name="nama_pasien"]').val(data.nama_pasien);
                    $('[name="tgl_lahir"]').val(data.tgl_lahir);
                    $('[name="jenkel"]').val(data.jenkel);
                    $('[name="jaminan"]').val(data.jaminan);
                    $('[name="no_bpjs"]').val(data.no_bpjs);
                    $('[name="alamat_lengkap"]').val(data.alamat_lengkap);
                    $('[name="kecamatan"]').val(data.kecamatan);
                    $('[name="kab_kota"]').val(data.kab_kota);
                    $('[name="kota_lain"]').val(data.kota_lain);

                    $('[name="no_rm"]').attr('readonly', 'readonly');

                    $('#modal_daftar').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Daftar Pasien'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Reload Data Table  Pendaftaran Pasien  --------------------------------------------------------------------------------------
        function reload_table_daftar() {
            $('#table_daftar').DataTable().ajax.reload();
        }

        function export_excel(id) {
            window.location.href = "<?php echo site_url('covid/excel_daftar/'); ?>" + id;
        }

        function export_excel_odprajal(id) {
            window.location.href = "<?php echo site_url('covid/excel_odprajal/'); ?>" + id;
        }
        // End Reload Data Table  Pendaftaran Pasien  --------------------------------------------------------------------------------------

        // Save Data Table Pendaftaran Pasien  --------------------------------------------------------------------------------------
        function save_daftar() {
            $('#btnSave_daftar').text('saving...'); //change button text
            $('#btnSave_daftar').attr('disabled', true); //set button disable 
            var url;

            if (save_daftar_method == 'add') {
                url = "<?php echo site_url('covid/ajax_add_daftar') ?>";
            } else {
                url = "<?php echo site_url('covid/ajax_update_daftar'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_daftar').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_daftar();
                        swal({
                            type: 'success',
                            title: 'Data Pendaftaran Pasien',
                            text: 'Anda Berhasil Memasukkan Pendaftaran Pasien'
                        })
                        $('#modal_daftar').modal('hide');
                    }
                    $('#btnSave_daftar').text('save'); //change button text
                    $('#btnSave_daftar').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_daftar').text('save'); //change button text
                    $('#btnSave_daftar').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data TablePendaftaran Pasien --------------------------------------------------------------------------------------

        // Delete Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
        function delete_daftar(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('covid/ajax_delete_daftar') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Pendaftaran Pasien',
                            text: 'Anda Berhasil Dihapus'
                        })
                        $('#modal_daftar').modal('hide');
                        reload_table_daftar();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }
        // End Delete Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Data Tabel Pendaftaran Pasien ------------------------------------------------------------
        var save_igd_method; //for save method string
        var table_igd;
        $(document).ready(function() {
            //datatables

            // Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
            table = $('#table_igd').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('covid/ajax_list_igd'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Tambah Data Table Pendaftaran Pasien--------------------------------------------------------------------------------------
        function add_igd() {
            save_igd_method = 'add';
            $('#form_igd')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            $('[name="no_rm"]').removeAttr('readonly', 'readonly');


            $('#modal_igd').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Daftar Pasien'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Edit Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
        function edit_igd(id) {
            save_igd_method = 'update';
            $('#form_igd')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('covid/ajax_edit_igd/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_daftar_pasien"]').val(data.id_daftar_pasien);
                    $('[name="no_rm"]').val(data.no_rm);
                    $('[name="nama_pasien"]').val(data.nama_pasien);
                    $('[name="tgl_lahir"]').val(data.tgl_lahir);
                    $('[name="jenkel"]').val(data.jenkel);
                    $('[name="umur"]').val(data.umur);
                    $('[name="tgl_pemeriksaan"]').val(data.tgl_pemeriksaan);
                    $('[name="diagnosa_masuk"]').val(data.diagnosa_masuk);
                    $('[name="komorbid"]').val(data.komorbid);
                    $('[name="status_covid_awal"]').val(data.status_covid_awal);
                    $('[name="totalaksana"]').val(data.totalaksana);
                    $('[name="rujuk_rs"]').val(data.rujuk_rs);
                    $('[name="meninggal_waktu"]').val(data.meninggal_waktu);
                    $('[name="rawat_inap_ruang"]').val(data.rawat_inap_ruang);
                    $('[name="tgl_rjp"]').val(data.tgl_rjp);
                    $('[name="control"]').val(data.control);

                    $('[name="no_rm"]').attr('readonly', 'readonly');


                    $('#modal_igd').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Daftar Pasien'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        function proses() {
            var nama_pasien = document.getElementById("no_rm").value;
            document.getElementById("nama_pasien").value = nama_pasien;
        }

        // Reload Data Table  Pendaftaran Pasien  --------------------------------------------------------------------------------------
        function reload_table_igd() {
            $('#table_igd').DataTable().ajax.reload();
        }
        // End Reload Data Table  Pendaftaran Pasien  --------------------------------------------------------------------------------------

        // Save Data Table Pendaftaran Pasien  --------------------------------------------------------------------------------------
        function save_igd() {
            $('#btnSave_igd').text('saving...'); //change button text
            $('#btnSave_igd').attr('disabled', true); //set button disable 
            var url;

            if (save_igd_method == 'add') {
                url = "<?php echo site_url('covid/ajax_add_igd') ?>";
            } else {
                url = "<?php echo site_url('covid/ajax_update_igd'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_igd').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_igd();
                        swal({
                            type: 'success',
                            title: 'Data Pendaftaran Pasien',
                            text: 'Anda Berhasil Memasukkan Pendaftaran Pasien'
                        })
                        $('#modal_igd').modal('hide');
                    }
                    $('#btnSave_igd').text('save'); //change button text
                    $('#btnSave_igd').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_igd').text('save'); //change button text
                    $('#btnSave_igd').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data TablePendaftaran Pasien --------------------------------------------------------------------------------------

        // Delete Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
        function delete_igd(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('covid/ajax_delete_igd') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Pendaftaran Pasien',
                            text: 'Anda Berhasil Dihapus'
                        })
                        $('#modal_igd').modal('hide');
                        reload_table_igd();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }
        // End Delete Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Data Tabel Pendaftaran Pasien ------------------------------------------------------------
        var save_odprajal_method; //for save method string
        var table_odprajal;
        $(document).ready(function() {
            //datatables

            // Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
            table = $('#table_odprajal').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('covid/ajax_list_odprajal'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Tambah Data Table Pendaftaran Pasien--------------------------------------------------------------------------------------
        function add_odprajal() {
            save_odprajal_method = 'add';
            $('#form_odprajal')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            $('[name="no_rm"]').removeAttr('readonly', 'readonly');

            $('#modal_odprajal').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Daftar Pasien'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Edit Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
        function edit_odprajal(id) {
            save_odprajal_method = 'update';
            $('#form_odprajal')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('covid/ajax_edit_odprajal/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_daftar_pasien"]').val(data.id_daftar_pasien);
                    $('[name="no_rm"]').val(data.no_rm);
                    $('[name="odpjal_pem_dl"]').val(data.odpjal_pem_dl);
                    $('[name="odpjal_pem_petugas_thorax"]').val(data.odpjal_pem_petugas_thorax);
                    $('[name="control"]').val(data.control);

                    $('[name="no_rm"]').attr('readonly', 'readonly');

                    $('#modal_odprajal').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Daftar Pasien'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Reload Data Table  Pendaftaran Pasien  --------------------------------------------------------------------------------------
        function reload_table_odprajal() {
            $('#table_odprajal').DataTable().ajax.reload();
        }
        // End Reload Data Table  Pendaftaran Pasien  --------------------------------------------------------------------------------------

        // Save Data Table Pendaftaran Pasien  --------------------------------------------------------------------------------------
        function save_odprajal() {
            $('#btnSave_odprajal').text('saving...'); //change button text
            $('#btnSave_odprajal').attr('disabled', true); //set button disable 
            var url;

            if (save_odprajal_method == 'add') {
                url = "<?php echo site_url('covid/ajax_add_odprajal') ?>";
            } else {
                url = "<?php echo site_url('covid/ajax_update_odprajal'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_odprajal').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_odprajal();
                        swal({
                            type: 'success',
                            title: 'Data Pendaftaran Pasien',
                            text: 'Anda Berhasil Memasukkan Pendaftaran Pasien'
                        })
                        $('#modal_odprajal').modal('hide');
                    }
                    $('#btnSave_odprajal').text('save'); //change button text
                    $('#btnSave_odprajal').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_odprajal').text('save'); //change button text
                    $('#btnSave_odprajal').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data TablePendaftaran Pasien --------------------------------------------------------------------------------------

        // Delete Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
        function delete_odprajal(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('covid/ajax_delete_odprajal') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Pendaftaran Pasien',
                            text: 'Anda Berhasil Dihapus'
                        })
                        $('#modal_odprajal').modal('hide');
                        reload_table_odprajal();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }
        // End Delete Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Detail & Print Data Table Surat Masuk --------------------------------------------------------------------------------------
        function detail_odprajal(id) {
            window.location.href = "<?php echo site_url('covid/detail_odprajal/'); ?>" + id;
        }

        function print_odprajal(id) {
            window.location.href = "<?php echo site_url('covid/print_odprajal/'); ?>" + id;
        }
        // End Detail Data Table Surat Masuk ------------------------------------------------------------------------------
    </script>

    <script type="text/javascript">
        // Data Tabel Pendaftaran Pasien ------------------------------------------------------------
        var save_odpranap_method; //for save method string
        var table_odpranap;
        $(document).ready(function() {
            //datatables

            // Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
            table = $('#table_odpranap').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('covid/ajax_list_odpranap'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Tambah Data Table Pendaftaran Pasien--------------------------------------------------------------------------------------
        function add_odpranap() {
            save_odpranap_method = 'add';
            $('#form_odpranap')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            $('[name="no_rm"]').removeAttr('readonly', 'readonly');

            $('#modal_odpranap').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Daftar Pasien'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Edit Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
        function edit_odpranap(id) {
            save_odpranap_method = 'update';
            $('#form_odpranap')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('covid/ajax_edit_odpranap/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_daftar_pasien"]').val(data.id_daftar_pasien);
                    $('[name="no_rm"]').val(data.no_rm);
                    $('[name="odpnap_dpjp"]').val(data.odpnap_dpjp);
                    $('[name="odpnap_dl"]').val(data.odpnap_dl);
                    $('[name="odpnap_ront_thorax"]').val(data.odpnap_ront_thorax);
                    $('[name="odpnap_rapid_tes1"]').val(data.odpnap_rapid_tes1);
                    $('[name="odpnap_tgl_rapid_tes1"]').val(data.odpnap_tgl_rapid_tes1);
                    $('[name="odpnap_hasil_rapid_tes1"]').val(data.odpnap_hasil_rapid_tes1);
                    $('[name="odpnap_status_covid"]').val(data.odpnap_status_covid);
                    $('[name="odpnap_hasil_status"]').val(data.odpnap_hasil_status);
                    $('[name="odpnap_diagnosa_akhir"]').val(data.odpnap_diagnosa_akhir);
                    $('[name="odpnap_tgl_krs"]').val(data.odpnap_tgl_krs);
                    $('[name="odpnap_kondisi_krs"]').val(data.odpnap_kondisi_krs);
                    $('[name="odpnap_tgl_rjp"]').val(data.odpnap_tgl_rjp);
                    $('[name="odpnap_rujuk_rs"]').val(data.odpnap_rujuk_rs);
                    $('[name="odpnap_meninggal_waktu"]').val(data.odpnap_meninggal_waktu);
                    $('[name="odpnap_waktu_isolasi"]').val(data.odpnap_waktu_isolasi);
                    $('[name="control"]').val(data.control);


                    $('[name="no_rm"]').attr('readonly', 'readonly');

                    $('#modal_odpranap').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Daftar Pasien'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        function proses2() {
            var pdpnap_waktu_isolasi = document.getElementById("reservation").value;
            document.getElementById("pdpnap_waktu_isolasi").value = pdpnap_waktu_isolasi;
        }


        // Reload Data Table  Pendaftaran Pasien  --------------------------------------------------------------------------------------
        function reload_table_odpranap() {
            $('#table_odpranap').DataTable().ajax.reload();
        }
        // End Reload Data Table  Pendaftaran Pasien  --------------------------------------------------------------------------------------

        // Save Data Table Pendaftaran Pasien  --------------------------------------------------------------------------------------
        function save_odpranap() {
            $('#btnSave_odpranap').text('saving...'); //change button text
            $('#btnSave_odpranap').attr('disabled', true); //set button disable 
            var url;

            if (save_odpranap_method == 'add') {
                url = "<?php echo site_url('covid/ajax_add_odpranap') ?>";
            } else {
                url = "<?php echo site_url('covid/ajax_update_odpranap'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_odpranap').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_odpranap();
                        swal({
                            type: 'success',
                            title: 'Data Pendaftaran Pasien',
                            text: 'Anda Berhasil Memasukkan Pendaftaran Pasien'
                        })
                        $('#modal_odpranap').modal('hide');
                    }
                    $('#btnSave_odpranap').text('save'); //change button text
                    $('#btnSave_odpranap').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_odpranap').text('save'); //change button text
                    $('#btnSave_odpranap').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data TablePendaftaran Pasien --------------------------------------------------------------------------------------

        // Delete Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
        function delete_odpranap(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('covid/ajax_delete_odpranap') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Pendaftaran Pasien',
                            text: 'Anda Berhasil Dihapus'
                        })
                        $('#modal_odpranap').modal('hide');
                        reload_table_odpranap();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }
        // End Delete Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
    </script>




    <script type="text/javascript">
        // Data Tabel Pendaftaran Pasien ------------------------------------------------------------
        var save_pdprajal_method; //for save method string
        var table_pdprajal;
        $(document).ready(function() {
            //datatables

            // Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
            table = $('#table_pdprajal').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('covid/ajax_list_pdprajal'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Tambah Data Table Pendaftaran Pasien--------------------------------------------------------------------------------------
        function add_pdprajal() {
            save_pdprajal_method = 'add';
            $('#form_pdprajal')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            $('[name="no_rm"]').removeAttr('readonly', 'readonly');

            $('#modal_pdprajal').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Daftar Pasien'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Edit Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
        function edit_pdprajal(id) {
            save_pdprajal_method = 'update';
            $('#form_pdprajal')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('covid/ajax_edit_pdprajal/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_daftar_pasien"]').val(data.id_daftar_pasien);
                    $('[name="no_rm"]').val(data.no_rm);
                    $('[name="pdpjal_dl"]').val(data.pdpjal_dl);
                    $('[name="pdpjal_ront_thorax"]').val(data.pdpjal_ront_thorax);
                    $('[name="pdpjal_rapid_tes"]').val(data.pdpjal_rapid_tes);
                    $('[name="pdpjal_hasil_rapid"]').val(data.pdpjal_hasil_rapid);
                    $('[name="pdpjal_swab"]').val(data.pdpjal_swab);
                    $('[name="pdpjal_tgl_ambil_sample"]').val(data.pdpjal_tgl_ambil_sample);
                    $('[name="pdpjal_tgl_kirim_sample"]').val(data.pdpjal_tgl_kirim_sample);
                    $('[name="control"]').val(data.control);

                    $('[name="no_rm"]').attr('readonly', 'readonly');

                    $('#modal_pdprajal').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Daftar Pasien'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Reload Data Table  Pendaftaran Pasien  --------------------------------------------------------------------------------------
        function reload_table_pdprajal() {
            $('#table_pdprajal').DataTable().ajax.reload();
        }
        // End Reload Data Table  Pendaftaran Pasien  --------------------------------------------------------------------------------------

        // Save Data Table Pendaftaran Pasien  --------------------------------------------------------------------------------------
        function save_pdprajal() {
            $('#btnSave_pdprajal').text('saving...'); //change button text
            $('#btnSave_pdprajal').attr('disabled', true); //set button disable 
            var url;

            if (save_pdprajal_method == 'add') {
                url = "<?php echo site_url('covid/ajax_add_pdprajal') ?>";
            } else {
                url = "<?php echo site_url('covid/ajax_update_pdprajal'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_pdprajal').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_pdprajal();
                        swal({
                            type: 'success',
                            title: 'Data Pendaftaran Pasien',
                            text: 'Anda Berhasil Memasukkan Pendaftaran Pasien'
                        })
                        $('#modal_pdprajal').modal('hide');
                    }
                    $('#btnSave_pdprajal').text('save'); //change button text
                    $('#btnSave_pdprajal').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_pdprajal').text('save'); //change button text
                    $('#btnSave_pdprajal').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data TablePendaftaran Pasien --------------------------------------------------------------------------------------

        // Delete Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
        function delete_pdprajal(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('covid/ajax_delete_pdprajal') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Pendaftaran Pasien',
                            text: 'Anda Berhasil Dihapus'
                        })
                        $('#modal_pdprajal').modal('hide');
                        reload_table_pdprajal();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }
        // End Delete Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
    </script>











    <script type="text/javascript">
        // Data Tabel Pendaftaran Pasien ------------------------------------------------------------
        var save_pdpranap_method; //for save method string
        var table_pdpranap;
        $(document).ready(function() {
            //datatables

            // Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
            table = $('#table_pdpranap').DataTable({

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                "rowReorder": {
                    "selector": "td:nth-child(2)"
                },
                "responsive": true,
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?= site_url('covid/ajax_list_pdpranap'); ?>",
                    "type": "POST"

                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                }, ],
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
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
        });
        // End Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Tambah Data Table Pendaftaran Pasien--------------------------------------------------------------------------------------
        function add_pdpranap() {
            save_pdpranap_method = 'add';
            $('#form_pdpranap')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            $('[name="no_rm"]').removeAttr('readonly', 'readonly');

            $('#modal_pdpranap').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add Daftar Pasien'); // Set Title to Bootstrap modal title
        }
        // End Tambah Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Edit Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
        function edit_pdpranap(id) {
            save_pdpranap_method = 'update';
            $('#form_pdpranap')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?= site_url('covid/ajax_edit_pdpranap/'); ?>" + id,
                beforeSend: function() { // swetalert ----------------------
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
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_daftar_pasien"]').val(data.id_daftar_pasien);
                    $('[name="no_rm"]').val(data.no_rm);
                    $('[name="pdpnap_dpjp"]').val(data.pdpnap_dpjp);
                    $('[name="pdpnap_dl"]').val(data.pdpnap_dl);
                    $('[name="pdpnap_ront_thorax"]').val(data.pdpnap_ront_thorax);
                    $('[name="pdpnap_rapid_tes1"]').val(data.pdpnap_rapid_tes1);
                    $('[name="pdpnap_tgl_rapid_tes1"]').val(data.pdpnap_tgl_rapid_tes1);
                    $('[name="pdpnap_hasil_rapid_tes1"]').val(data.pdpnap_hasil_rapid_tes1);
                    $('[name="pdpnap_swab"]').val(data.pdpnap_swab);
                    $('[name="pdpnap_tgl_swab"]').val(data.pdpnap_tgl_swab);
                    $('[name="pdpnap_hasil_swab"]').val(data.pdpnap_hasil_swab);
                    $('[name="pdpnap_status_covid"]').val(data.pdpnap_status_covid);
                    $('[name="pdpnap_hasil_status"]').val(data.pdpnap_hasil_status);
                    $('[name="pdpnap_diagnosa_akhir"]').val(data.pdpnap_diagnosa_akhir);
                    $('[name="pdpnap_tgl_krs"]').val(data.pdpnap_tgl_krs);
                    $('[name="pdpnap_kondisi_krs"]').val(data.pdpnap_kondisi_krs);
                    $('[name="pdpnap_tgl_rjp"]').val(data.pdpnap_tgl_rjp);
                    $('[name="pdpnap_rujuk_rs"]').val(data.pdpnap_rujuk_rs);
                    $('[name="pdpnap_meninggal_waktu"]').val(data.pdpnap_meninggal_waktu);
                    $('[name="pdpnap_waktu_isolasi"]').val(data.pdpnap_waktu_isolasi);
                    $('[name="control"]').val(data.control);

                    $('[name="no_rm"]').attr('readonly', 'readonly');

                    $('#modal_pdpranap').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit Daftar Pasien'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
        // End Edit Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------

        // Reload Data Table  Pendaftaran Pasien  --------------------------------------------------------------------------------------
        function reload_table_pdpranap() {
            $('#table_pdpranap').DataTable().ajax.reload();
        }
        // End Reload Data Table  Pendaftaran Pasien  --------------------------------------------------------------------------------------

        // Save Data Table Pendaftaran Pasien  --------------------------------------------------------------------------------------
        function save_pdpranap() {
            $('#btnSave_pdpranap').text('saving...'); //change button text
            $('#btnSave_pdpranap').attr('disabled', true); //set button disable 
            var url;

            if (save_pdpranap_method == 'add') {
                url = "<?php echo site_url('covid/ajax_add_pdpranap') ?>";
            } else {
                url = "<?php echo site_url('covid/ajax_update_pdpranap'); ?>";
            }

            // ajax adding data to database
            $.ajax({
                url: url,
                beforeSend: function() { // swetalert ----------------------
                    swal({
                        title: 'Menunggu',
                        html: 'Memproses data',
                        timer: 500,
                        onOpen: () => {
                            swal.showLoading()
                        }
                    })
                }, // Batas swetalert ------------------------
                type: "POST",
                data: $('#form_pdpranap').serialize(),
                dataType: "JSON",
                success: function(data) {
                    if (data.status === false) //if success close modal and reload ajax table
                    {
                        alert(data.kliru);
                    } else {
                        reload_table_pdpranap();
                        swal({
                            type: 'success',
                            title: 'Data Pendaftaran Pasien',
                            text: 'Anda Berhasil Memasukkan Pendaftaran Pasien'
                        })
                        $('#modal_pdpranap').modal('hide');
                    }
                    $('#btnSave_pdpranap').text('save'); //change button text
                    $('#btnSave_pdpranap').attr('disabled', false); //set button enable 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                    $('#btnSave_pdpranap').text('save'); //change button text
                    $('#btnSave_pdpranap').attr('disabled', false); //set button enable 
                }
            });
        }
        // End Save Data TablePendaftaran Pasien --------------------------------------------------------------------------------------

        // Delete Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
        function delete_pdpranap(id) {
            if (confirm('Are you sure delete this data?')) {
                // ajax delete data to database
                $.ajax({
                    url: "<?php echo site_url('covid/ajax_delete_pdpranap') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        swal({
                            type: 'success',
                            title: 'Data Pendaftaran Pasien',
                            text: 'Anda Berhasil Dihapus'
                        })
                        $('#modal_pdpranap').modal('hide');
                        reload_table_pdpranap();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });

            }
        }
        // End Delete Data Table Pendaftaran Pasien --------------------------------------------------------------------------------------
    </script>










</body>

</html>