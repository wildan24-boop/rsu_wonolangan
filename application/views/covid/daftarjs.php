<script>

$("#kab_kota").change(function(){
    $.ajax({
            url : "<?=site_url('covid/get_kecamatan/');?>" + this.value,
            beforeSend :function () { // swetalert ----------------------
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
        success: function(data)
        {
            // alert(data);
            var objkecamatan = JSON.parse(data);
            
            var datakecamatan = "";
            $.each(objkecamatan, function(index, value){
                datakecamatan += '<option value="'+value.nama_kecamatan+'"> '+value.nama_kecamatan+'</option>';
               
            });    
            $("#kecamatan").html(datakecamatan);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
});

</script>