$(document).ready(async function() {
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    let getData = async (path, id) => {
        let url = "http://survey-in.test/api";
        let fd = new FormData();
        fd.append("id", id);
        let requestOptions = {
            method: "POST",
            Headers: {
                "Content-Type": "application/json",
            },
            body: fd,
        };
        return fetch(`${url}${path}`, requestOptions)
            .then((response) => response.text())
            .then((result) => {
                return JSON.parse(result);
            })
            .catch((error) => console.log("error", error));
    };

    let setKecamatan = async (idKab = 13) => {
        let data;
        try {
            data = await getData(`/kecamatan`, idKab);
        } catch (error) {}
        $("#kecamatan").html("");
        data.data.forEach((element) => {
            $("#kecamatan").append(new Option(element.nama, element.id))
        });
    };

    let setData = async function(target){
        let dataS;
        try {
            dataS = await getData("/data-survei", target);
        } catch (error) {}
        console.log(dataS);
        if (dataS.data.length == 0) {
            $('#kota').empty();
            $("#kota").append(
                '<p>Nama Gang : -</p>\<p>Lokasi : -</p>\<p>Koordinat : -</p>\<p>Surveyor : -</p><hr>'
            );
        } else {
            $('#kota').empty();
            dataS.data.forEach((element) => {
                $("#kota").append('<p>Nama Gang : ' + element.nama_gang +
                    '</p>\<p>Lokasi : ' +
                    element.lokasi + '</p>\<p>Koordinat : ' + element.no_gps +
                    '</p>\<p>Surveyor : ' + element.user.nama_lengkap +
                    '</p>\<a href="/data-survei/' + element.id +
                    '">Detail</a><hr>'
                );
            })
        };
    }

    $("#kabupaten").change(function(e) {
        e.preventDefault();
        setKecamatan($(this).val());
    });

    $("#kecamatan").change(function(e) {
        e.preventDefault();
        setData($(this).val());
    });

    // $('#kabupaten').on('change', function() {
    //     var co = $(this).val();
    //     if (co) {
    //         $.ajax({
    //             url: '${url}',
    //             method: 'POST',
    //             dataType: 'json',
    //             data: {
    //                 id_kabupaten: $(this).val()
    //             },
    //             success: function(response) {
    //                 $('#kecamatan').empty();

    //                 $.each(response, function(key, value) {
    //                     $('#kecamatan').append(new Option(value.nama, key))
    //                 });
    //             }
    //         })
    //     }

    // });

    // $('#kecamatan').on('change', function() {
    //     var ci = $(this).val();
    //     if (ci) {
    //         $.ajax({
    //             url: '{{ route('get-data') }}',
    //             method: 'POST',
    //             dataType: 'json',
    //             data: {
    //                 id_kecamatan: $(this).val(),
    //                 id_kabupaten: $('#kabupaten').val()
    //             },
    //             success: function(response) {
    //                 $('#kota').empty();

    //                 $.each(response, function(key, value) {
    //                     nama_gang = value.nama_gang;
    //                     lokasi = value.lokasi;
    //                     no_gps = value.no_gps;
    //                     surveyor = value.user.nama_lengkap;
    //                     $('#kota').append('<p>Nama Gang : ' + nama_gang +
    //                         '</p>\<p>Lokasi : ' +
    //                         lokasi + '</p>\<p>Koordinat : ' + no_gps +
    //                         '</p>\<p>Surveyor : ' + surveyor +
    //                         '</p>\<a href="/data-survei/' + value.user_id +
    //                         '">Detail</a><hr>'
    //                     );
    //                 });
    //             }
    //         })
    //     }
    // });
});