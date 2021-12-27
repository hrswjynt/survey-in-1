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
            <ul id="list-kecamatan" class="d-flex flex-row">
                
            </ul>
        </div>
    </div>
@endsection('main-content')