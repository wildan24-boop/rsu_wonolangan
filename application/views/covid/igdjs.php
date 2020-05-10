<script>
  

    function hideform() {
        $("#form_rjp").hide();
        $("#form_rujuk").hide();
        $("#form_meninggal").hide();
        $("#form_RI").hide();
    }
    hideform();
    $("#totalaksana").change(function(){
        var val = this.value;
        hideform();
        if(val == "Rawat Jalan Pulang"){
            $("#form_rjp").show();
        }
        if(val == "Rujuk"){
            $("#form_rujuk").show();
        }
        if(val == "Meninggal"){
            $("#form_meninggal").show();
        }
        if(val == "Rawat Inap"){
            $("#form_RI").show();
        }
    });

    $("#no_rm").change(function() {
        $("#no_rm").removeClass("select2-hidden-accessible");

        $.ajax({
            url: "<?= site_url('covid/get_pasien/'); ?>" + this.value,
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
            success: function(data) {
                var objpasien = JSON.parse(data);
                $("#nama_pasien").val(objpasien.nama_pasien);
                $("#tgl_lahir").val(objpasien.tgl_lahir);
                $("#jenkel").val(objpasien.jenkel);
                $("#umur").val(objpasien.umur);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    });
</script>