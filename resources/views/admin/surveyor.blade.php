@extends('admin.main')
@section('main-content')
    @include('admin.header')
    <!-- Content -->
    <div class="content d-flex flex-column">
        <div class="admin-hl text-center">
            <h1>Akun Surveyor</h1>
            <p>Aplikasi Survei Gang dan Perumahan di Kota Pontianak</p>
        </div>

        <!-- Button Tambah -->
        
        {{-- <button class="btn-tambah shadow"></button> --}}
        <div class="btn-content text-end  me-5 mb-5 ">
            <a href="/surveyor/tambah" class="btn-tambah shadow text-decoration-none text-white ">+Tambah Akun</a>
        </div>

        <!-- Daftar AKun -->
        <div class="daftar-akun">
            <!-- Akun Surveyor 1 -->
            @foreach ($surveyors as $surveyor)
                <div class="akun-surveyor d-flex justify-content-between align-items-center flex-md-row flex-column">
                    <div class="nama-akun">
                        {{ $surveyor->nama_lengkap }}
                    </div>
                    <div class="tindakan">
                        <a href="/surveyor/profile/{{ $surveyor->id }}" class="btn-aksi profil text-decoration-none">Profil</a>
                        <a href="/surveyor/target/{{ $surveyor->id }}" class="btn-aksi target text-decoration-none">Target</a>
                        <button class="btn-aksi hapus" data-bs-toggle="modal" data-bs-target="#hapusSurveyor"><a
                                href="/surveyor/user/hapus/{{ $surveyor->id }}">Hapus</a></button>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Contntet End -->
@endsection
