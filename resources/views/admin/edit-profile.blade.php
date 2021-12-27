@extends('admin.main')
@section('main-content')
    <div class="content d-flex flex-column" id="prf-edit-content">
        <div class="admin-hl mt-4">
            <h1>Profile Admin</h1>
            <p>Profil Admin berisi data pribadi Admin.</p>
            <div class="admin d-flex">
                <img src="img/cat.png" alt="" class="hl-img rounded-circle">
                <div class="hl-upload ms-4 d-flex flex-column justify-content-center">
                    <button type="submit" class="btn btn-primary ms-4 shadow-none" id="upload">Ubah foto profile</button>
                    <p class="upload mt-1">maks upload (2 Mb)</p>
                </div>
            </div>
            <div class="hl-status mt-3 d-flex flex-column justify-content-center">
                <h3>Azizi Iqbalika</h3>
                <p>Admin</p>
            </div>
        </div>

        <form action="" class="bio-edit d-flex flex-row mt-4" id="prf-edit-form" autocomplete="off">
            <div class="bio-left w-100 d-flex flex-column align-items-center">
                <div class="col-md-8 mb-3">
                    <label for="validationServer01" class="form-label">Nama Lengkap :</label>
                    <input type="text" class="form-control is-invalid" id="validationServer01"
                        aria-describedby="validationServer01Feedback" required>
                    <div id="validationServer01Feedback" class="invalid-feedback">
                        Harap berikan nama yang valid.
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="validationServer02" class="form-label">NIP :</label>
                    <input type="text" class="form-control is-invalid" id="validationServer02"
                        aria-describedby="validationServer02Feedback" required>
                    <div id="validationServer02Feedback" class="invalid-feedback">
                        Harap berikan NIP yang valid.
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="validationServer03" class="form-label">Email :</label>
                    <input type="text" class="form-control is-invalid" id="validationServer03"
                        aria-describedby="validationServer03Feedback" required>
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        Harap berikan email yang valid.
                    </div>
                </div>
            </div>

            <div class="bio-right w-100 d-flex flex-column align-items-center">
                <div class="col-md-8 mb-3">
                    <label for="validationServer04" class="form-label">Jenis Kelamin :</label>
                    <select class="form-select is-invalid" id="validationServer04"
                        aria-describedby="validationServer04Feedback" required>
                        <option selected disabled value="">Pilih...</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                    <div id="validationServer04Feedback" class="invalid-feedback">
                        Harap berikan jenis kelamin yang valid.
                    </div>
                </div>
                <div class="col-md-8 mb-3 mt-2">
                    <label for="validationServer05" class="form-label">No. Handphone :</label>
                    <input type="text" class="form-control is-invalid" id="validationServer05"
                        aria-describedby="validationServer05Feedback" required>
                    <div id="validationServer05Feedback" class="invalid-feedback">
                        Harap berikan nomor yang valid.
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="validationServer06" class="form-label">Alamat :</label>
                    <input type="text" class="form-control is-invalid" id="validationServer06"
                        aria-describedby="validationServer06Feedback" required>
                    <div id="validationServer06Feedback" class="invalid-feedback">
                        Harap berikan alamat yang valid.
                    </div>
                </div>
            </div>
        </form>
        <div class="submit d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-lg btn-primary mb-5" id="submit">Simpan perubahan</button>
        </div>
    </div>
@endsection
