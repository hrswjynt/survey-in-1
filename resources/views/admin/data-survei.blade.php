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

    <script src="/js/data-survei.js"></script>

@endsection
