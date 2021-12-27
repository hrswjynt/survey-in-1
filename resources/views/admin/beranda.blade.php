@extends('admin.main')
@section('main-content')
    @include('admin.header')
    <div class="content d-flex flex-column" id="beranda">
        <div class="row justify-content-center">
            <div class="col-4">
                <select class="form-select" aria-label="Default select example" name="kabupaten" id="kabupaten">
                        <option selected>--Pilih kabupaten/Kota--</option>
                        @foreach ($kabupaten as $kab)
                        <option value="{{ $kab->id }}">{{ $kab->nama }}</option>
                        @endforeach
                </select>
            </div>
            <ul id="list-kecamatan" class="d-flex flex-row text-center">
                
            </ul>
        </div>
        <div>
            <p>Jumlah Gang =<span id="jmlGang">0</span></p>
            <p>Jumlah Rumah =<span id="jmlRumah">0</span></p>
            <p>Panjang Jalan =<span id="pnjJalan">0</span></p>
            <p>Lebar Jalan =<span id="lbrJalan">0</span></p>
            <p>Jalan Jelek =<span id="jlnJelek">0</span>%</p>
            <p>Jalan Bagus =<span id="jlnBaik">0</span>%</p>

        </div>
    </div>
@endsection('main-content')