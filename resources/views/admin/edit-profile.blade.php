@extends('admin.main')
@section('main-content')
    <div class="content d-flex flex-column" id="prf-edit-content">
        <div class="admin-hl mt-4 ps-sm-5 ms-sm-2 ps-1">
            <h1>Profile Admin</h1>
            <p class=" col-sm-10 col-8">Profil Admin berisi data pribadi Admin.</p>
            <div class="admin d-sm-flex d-block">
                <img src="/img/cat.png" alt="" class="hl-img rounded-circle">
                <div class="hl-upload ms-sm-4 d-flex flex-column justify-content-center">
                    <button type="submit" class="btn btn-primary ms-sm-4 shadow-none" id="upload">Ubah foto profile</button>
                    <p class="upload mt-1 ms-0 ms-sm-4">maks upload (2 Mb)</p>
                </div>
            </div>
            <div class="hl-status mt-3 d-flex flex-column justify-content-center">
                <h3>{{ $profile->nama_lengkap }}</h3>
                <p>{{ $profile->role }}</p>
            </div>
        </div>

        <form action="/profile/edit-profile/admin" id="prf-edit-form" autocomplete="off" method="POST">
            @csrf
            @method('patch')
            <div class="bio-edit d-flex flex-sm-row flex-column flex mt-4">
                <input type="hidden" name="id" value="{{ $profile->id }}">
                <div class="bio-left w-100 d-flex flex-column align-items-start align-items-sm-center">
                    <div class="col-8 mb-3">
                        <label for="validationServer01" class="form-label">Nama Lengkap :</label>
                        <input type="text" class="form-control  @error('nama_lengkap') is-invalid @enderror" id="validationServer01"
                            aria-describedby="validationServer01Feedback" value="{{ $profile->nama_lengkap }}" name="nama_lengkap">
                        @error('nama_lengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-8 mb-3">
                        <label for="validationServer02" class="form-label">Tanggal Lahir :</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="validationServer02"
                            aria-describedby="validationServer02Feedback" value="{{ $profile->tanggal_lahir }}" name="tanggal_lahir">
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-8 mb-3">
                        <label for="validationServer03" class="form-label">Email :</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="validationServer03"
                            aria-describedby="validationServer03Feedback"  value="{{ $profile->email }}" name="email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="bio-right w-100 d-flex flex-column align-items-start align-items-sm-center">
                    <div class="col-8 mb-3">
                        <label for="validationServer04" class="form-label">Jenis Kelamin :</label>
                        <select class="form-select w-100 @error('gender') is-invalid @enderror" id="validationServer04"
                            aria-describedby="validationServer04Feedback" name="gender">
                            <option disabled>Pilih...</option>
                            <option value="laki-laki" {{ ($profile->gender=='laki-laki')? 'selected':'' }}>Laki-laki</option>
                            <option value="perempuan" {{ ($profile->gender=='perempuan')? 'selected':'' }}>Perempuan</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-8 mb-3 mt-2">
                        <label for="validationServer05" class="form-label">No. Handphone :</label>
                        <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="validationServer05"
                            aria-describedby="validationServer05Feedback" value="{{ $profile->nomor_telepon }}" name="nomor_telepon">
                        @error('nomor_telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-8 mb-3">
                        <label for="validationServer06" class="form-label">Alamat :</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="validationServer06"
                            aria-describedby="validationServer06Feedback" value="{{ $profile->alamat }}" name="alamat">
                        <div id="validationServer06Feedback" class="invalid-feedback">
                            Harap berikan alamat yang valid.
                        </div>
                    </div>
                </div>
            </div>
            <div class="submit d-flex justify-content-center mt-5 col-8 col-sm-12">
                <button type="submit" class="btn btn-lg btn-primary mb-5 h-auto" id="submit">Simpan perubahan</button>
            </div>
        </form>
    </div>
@endsection
