<script>
  

    function hideform() {
        $("#form_rjp").hide();
        $("#form_rujuk").hide();
        $("#form_meninggal").hide();
        $("#form_isolasidiri").hide();
    }
    hideform();
    $("#odpnap_kondisi_krs").change(function(){
        var val = this.value;
        hideform();
        if(val == "Rajal Pulang"){
            $("#form_rjp").show();
        }
        if(val == "Rujuk"){
            $("#form_rujuk").show();
        }
        if(val == "Meninggal"){
            $("#form_meninggal").show();
        }
        if(val == "Isolasi diri"){
            $("#form_isolasidiri").show();
        }
    });

</script>