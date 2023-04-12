<script>
    function getKota(id) {
        if (id) {
            $.ajax({
                type: "GET",
                url: "getKota?provID=" + id,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#kota").empty();
                        $("#kota").append('<option>-- Pilih Kota --</option>');
                        $.each(res, function(nama, id) {
                            $("#kota").append('<option value="' + id + '">' + nama + '</option>');
                        });
                    } else {
                        $("#kota").empty();
                    }
                }
            });
        } else {
            $("#kota").empty();
        }
    }

    function getKecamatan(id) {

    }

    function getKelurahan(id) {

    }
</script>
