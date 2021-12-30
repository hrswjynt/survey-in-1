@extends('admin.main')
@section('main-content')
    @include('admin.header')
    <form action="" method="POST">
        @csrf
        <select name="kabupaten" id="kabupaten">
            <option value="">Choose Category</option>
            @foreach ($data as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
        </select>
        <br>
        <select name="kecamatan" id="kecamatan">
            <option hidden>Choose Category</option>
        </select>
        <br>
        <div class="kota" id="kota">
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#kabupaten').on('change', function() {
                var co = $(this).val();
                if (co) {
                    $.ajax({
                        url: '{{ route('get-data') }}',
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            id_kabupaten: $(this).val()
                        },
                        success: function(response) {
                            $('#kecamatan').empty();

                            $.each(response, function(key, value) {
                                $('#kecamatan').append(new Option(value.nama, key))
                            });
                        }
                    })
                }

            });

            $('#kecamatan').on('change', function() {
                var ci = $(this).val();
                if (ci) {
                    $.ajax({
                        url: '{{ route('get-data') }}',
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            id_kecamatan: $(this).val(),
                            id_kabupaten: $('#kabupaten').val()
                        },
                        success: function(response) {
                            $('#kota').empty();

                            $.each(response, function(key, value) {
                                nama_gang = value.nama_gang;
                                lokasi = value.lokasi;
                                no_gps = value.no_gps;
                                surveyor = value.user.nama_lengkap;
                                $('#kota').append('<p>Nama Gang : ' + nama_gang +
                                    '</p>\<p>Lokasi : ' +
                                    lokasi + '</p>\<p>Koordinat : ' + no_gps +
                                    '</p>\<p>Surveyor : ' + surveyor +
                                    '</p>\<a href="/data-survei/' + value.user_id +
                                    '">Detail</a><hr>'
                                );
                            });
                        }
                    })
                }
            });
        });
    </script>
@endsection
