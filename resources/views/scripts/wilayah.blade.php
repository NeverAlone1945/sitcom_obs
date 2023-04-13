<script>
    function getCity(id) {
        if (id) {
            $.ajax({
                type: "GET",
                url: "getKota?provID=" + id,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#city").empty();
                        $("#city").append('<option>-- Pilih Kota --</option>');
                        $.each(res, function(nama, id) {
                            $("#city").append('<option value="' + id + '">' + nama + '</option>');
                        });
                    } else {
                        $("#city").empty();
                    }
                }
            });
        } else {
            $("#city").empty();
        }
    }

    function getDistrict(id) {
        if (id) {
            $.ajax({
                type: "GET",
                url: "getKecamatan?kotaID=" + id,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#district").empty();
                        $("#district").append('<option>-- Pilih Kecamatan --</option>');
                        $.each(res, function(nama, id) {
                            $("#district").append('<option value="' + id + '">' + nama +
                                '</option>');
                        });
                    } else {
                        $("#district").empty();
                    }
                }
            });
        } else {
            $("#district").empty();
        }
    }

    function getSubdistrict(id) {
        if (id) {
            $.ajax({
                type: "GET",
                url: "getKelurahan?kecID=" + id,
                dataType: 'JSON',
                success: function(res) {
                    if (res) {
                        $("#subdistrict").empty();
                        $("#subdistrict").append('<option>-- Pilih Kelurahan --</option>');
                        $.each(res, function(nama, id) {
                            $("#subdistrict").append('<option value="' + id + '">' + nama +
                                '</option>');
                        });
                    } else {
                        $("#subdistrict").empty();
                    }
                }
            });
        } else {
            $("#subdistrict").empty();
        }
    }
</script>
