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
        if (id) {
            $.ajax({
                type: "GET",
                url: "getKecamatan?kotaID=" + id,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#kecamatan").empty();
                        $("#kecamatan").append('<option>-- Pilih Kecamatan --</option>');
                        $.each(res, function(nama, id) {
                            $("#kecamatan").append('<option value="' + id + '">' + nama +
                                '</option>');
                        });
                    } else {
                        $("#kecamatan").empty();
                    }
                }
            });
        } else {
            $("#kecamatan").empty();
        }
    }

    function getKelurahan(id) {
        if (id) {
            $.ajax({
                type: "GET",
                url: "getKelurahan?kecID=" + id,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#kelurahan").empty();
                        $("#kelurahan").append('<option>-- Pilih Kelurahan --</option>');
                        $.each(res, function(nama, id) {
                            $("#kelurahan").append('<option value="' + id + '">' + nama +
                                '</option>');
                        });
                    } else {
                        $("#kelurahan").empty();
                    }
                }
            });
        } else {
            $("#kelurahan").empty();
        }
    }
</script>
