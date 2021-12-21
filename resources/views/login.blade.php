

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="fontawesome5/css/all.css">
    <link rel="stylesheet" href="css/login-page.css">
</head>
<body>
    <div class="container">
        <!-- container-form-login -->
        <div class="login-form">
            <h1>Mari kita mulai</h1>
            <form action="" method="post" class="login">
                <p>Username</p>
                <input type="text" name="username" id="id_username">
                <p>Password</p>
                <input type="password" name="password" id="id_password">
                <i class="far fa-eye" id="togglePassword"></i>
                <a href="">Lupa kata sandi ?</a>
            </form>
            <button type="submit" class="btn btn-masuk">Masuk</button>
        </div>
        <!-- end container-form-login -->

        <!-- container-hero -->
        <div class="login-hero">
            <section class="hero">
                <div class="logo">
                    <div class="img">
                    <p>Survei</p>
                    </div>
                </div>
                <h1 class="hero">
                    Selamat datang di aplikasi website <span>survei</span>
                </h1>
                <p class="hero">Aplikasi ini memudahkan anda untuk menyimpan data hasil survei gang dan perumahan</p>
            </section>
        </div>
        <!-- end container-hero -->
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#id_password');
            
            togglePassword.addEventListener('click', function (e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // toggle the eye slash icon
                this.classList.toggle('fa-eye-slash');
            });
    </script>
</body>
</html>