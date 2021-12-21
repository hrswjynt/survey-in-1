<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil-page</title>
    <link rel="stylesheet" href="fontawesome5/css/all.css">
    <link rel="stylesheet" href="../surveyin/css/profil-page.css">
</head>

<body>

    <div class="container">
        <!-- sidebar -->
        <div class="sidebar" id="mySidebar">
            <div class="side">
                <div class="span" id="mySpan">
                    <input type="checkbox" />
                    <!-- <span></span>
                <span></span>
                <span></span> -->
                </div>
                <div class="logo">
                    <div class="img">
                        <h2>Survei</h2>
                    </div>
                    <p>Aplikasi Survei Gang dan Perumahan di Kota Pontianak</p>
                </div>
                <ul class="menu">
                    <li><a href=""><span class="icon b"></span>Beranda</a></li>
                    <li><a href=""><span class="icon a"></span>Profile</a></li>
                    <li><a href=""><span class="icon c"></span>Surveyor</a></li>
                    <li><a href=""><span class="icon d"></span>Data Survei</a></li>
                    <li><a href=""><span class="icon e"></span>Pengaturan</a></li>
                    <li><a href=""><span class="icon f"></span>Keluar</a></li>
                </ul>
            </div>
        </div>

        <!-- sidebar end -->


        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                <div class="subhead-a">
                    <h1>Profile</h1>
                </div>
                <div class="subhead-b">
                    <p>Azizi Iqbalika</p>
                    <div class="profil-img"></div>
                    <div class="dropdown">
                        <button class="dropbtn"><i class="fas fa-angle-down"></i></button>
                        <div class="drop-content">
                            <a href="">Profile Admin</a>
                            <button id="open">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr solid>

            <!-- Content -->
            <div class="content">
                <div class="admin-hl">
                    <h1>Edit Profile Admin</h1>
                    <p class="hl">Lengkapi data pribadi Anda dengan lengkap di bawah ini</p>
                    <div class="admin-img">
                        <div class="admin-foto">
                            <button class="upload-btn">Ubah foto profile
                            </button>
                            <p>maks upload (2 mb)</p>
                        </div>
                    </div>
                    <h2>Azizi Iqbalika</h2>
                    <p class="status">Admin</p>
                </div>
                <!-- ===================== -->
                <form action="" method="post">
                    <div class="namalengkap">
                        <p>Nama Lengkap :</p>
                        <input type="text" input autocomplete="off" required>
                    </div>
                    <div class="jkelamin">
                        <p>Jenis Kelamin :</p>
                        <select name="" id="" input autocomplete="off" required>
                            <option value=""></option>
                            <option value="">Laki-laki</option>
                            <option value="">Perempuan</option>
                        </select>
                    </div>
                    <div class="nip">
                        <p>NIP :</p>
                        <input type="text" input autocomplete="off" required>
                    </div>
                    <div class="phone">
                        <p>No Handphone :</p>
                        <input type="tel" input autocomplete="off" required>
                    </div>
                    <div class="email">
                        <p>Email :</p>
                        <input type="email" input autocomplete="off" required>
                    </div>
                    <div class="alamat">
                        <p>Alamat :</p>
                        <input type="text" input autocomplete="off" required>
                    </div>
                    <button type="submit" id="btn-daftar">Simpan Perubahan</button>
                </form>

            </div>

            <!-- Footer -->
            <div class="footer">
                <hr>
                <p>&copy; 2021 Website Survei</p>
            </div>
        </div>


        <div class="modal-container" id="modal_container">
            <div class="modal">

                <p>Anda yakin ingin keluar<br>dari aplikasi ini ?</p>
                <button id="close">Keluar</button>
                <button id="cancel">Batal</button>
            </div>
        </div>
    </div>
    <!-- Main Content End -->
    <script src="js/script.js"></script>
    <script src="js/modal.js"></script>
</body>

</html>