@extends('admin.main')
@section('main-content')
@include('admin.header')
<div class="content d-flex flex-column" id="edit-pw-content">
    <div class="admin-hl mt-4 ps-sm-5 ms-sm-2 ps-1">
        <h1>Ubah Password Admin</h1>
        <p>Ubah password demi keamanan privasi Anda</p>
    </div>

    <div class="login-form d-flex flex-column w-100 justify-content-center mt-5" id="edit-pw-login">
        <form action="/pengaturan/ubah-password" method="post" class="login d-flex flex-column ps-sm-3 ms-sm-3 ms-1 col-md-6 col-12" autocomplete="off">
            {{-- <div class="login mb-3 ms-sm-5 w-75">
                <label for="exampleInputEmail1" class="form-label login">Email :</label>
                <input name="email" type="email" class="kolom form-control shadow-none" id="id_email"
                    aria-describedby="emailHelp">
            </div> --}}
            @csrf
            <div class="login mb-3 ms-sm-5 w-75 position-relative">
                <label for="exampleInputPassword1" class="form-label login">Password Lama :</label>
                <input name="old_password" type="password"
                    class="kolom form-control shadow-none pe-5 @error('old_password') is-invalid @enderror"
                    id="id_password">
                @error('old_password')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <i class="far fa-eye position-absolute p-1" id="togglePassword"></i>
            </div>
            <div class="login mb-3 ms-sm-5 w-75 position-relative">
                <label for="exampleInputPassword1" class="form-label login">Password Baru :</label>
                <input name="new_password" type="password"
                    class="kolom form-control shadow-none pe-5 @error('new_password') is-invalid @enderror"
                    id="id_password1">
                @error('new_password')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <i class="far fa-eye position-absolute p-1" id="togglePassword1"></i>
            </div>
            <div class="login mb-3 ms-sm-5 mb-4 w-75 position-relative">
                <label for="exampleInputPassword1" class="form-label login">Ulangi Password :</label>
                <input name="new_password_confirmation" type="password"
                    class="kolom form-control shadow-none pe-5 @error('new_password_confirmation') is-invalid @enderror"
                    id="id_password2">
                @error('new_password_confirmation')
                <div id="validationServer03Feedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <i class="far fa-eye position-absolute p-1" id="togglePassword2"></i>
            </div>
<<<<<<< HEAD
            <button type="submit" class="btn btn-primary w-75 ms-sm-5 mt-4 mb-5 h-auto ps-2 pe-2 align-items-start" id="edit-pw">Simpan Perubahan</button>
=======
            <button type="submit" class="btn btn-primary w-50 ms-5 mt-4 mb-5" id="edit-pw">Simpan</button>
>>>>>>> da1a89797a278278a471aa7ede7dd63fc33fde65
        </form>
    </div>
</div>
<!-- custom js -->
<script>
    var menu_btn = document.querySelector("#menu-btn")
        var sidebar = document.querySelector("#sidebar")
        var container = document.querySelector(".my-container")
        menu_btn.addEventListener("click", () => {
            sidebar.classList.toggle("active-nav")
            container.classList.toggle("active-cont")
        })
</script>

<script>
    const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
</script>

<script>
    const togglePassword1 = document.querySelector('#togglePassword1');
        const password1 = document.querySelector('#id_password1');

        togglePassword1.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
            password1.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
</script>

<script>
    const togglePassword2 = document.querySelector('#togglePassword2');
        const password2 = document.querySelector('#id_password2');

        togglePassword2.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
</script>
@endsection