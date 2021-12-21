<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil-page-utama</title>
    <link rel="stylesheet" href="/fontawesome5/css/all.css">
    <link rel="stylesheet" href="/css/profil-utama.css">
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
                <div class="img"><h2>Survei</h2></div>
                <p>Aplikasi Survei Gang dan Perumahan  di Kota Pontianak</p>
                </div>
                <ul class="menu">
                    <li><a href=""><span class="icon b"></span>Beranda</a></li>
                    <li><a href=""><span class="icon a"></span>Profile</a></li>
                    <li><a href=""><span class="icon c"></span>Surveyor</a></li>
                    <li><a href=""><span class="icon d"></span>Data Survei</a></li>
                    <li><a href=""><span class="icon e"></span>Pengaturan</a></li>
                    <li><a href="/"><span class="icon f"></span>Keluar</a></li>
                </ul>
           </div>     
        </div>

        <!-- sidebar end -->


         <!-- Main Content -->
        <div class="main-content">
            {{-- @dd($profile) --}}
            <!-- Header -->
            <div class="header">
                <div class="subhead-a">
                    <h1>Profile</h1>
                </div>
                <div class="subhead-b">
                    <p>Profile Admin</p>
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
                    <h1>Profile Admin</h1>
                    <p class="hl">Lengkapi data pribadi Anda dengan lengkap di bawah ini</p>
                    <div class="admin-img">
                        <div class="admin-foto">
                        </div>
                        <h2>Azizi Iqbalika</h2>
                    <p class="status">Admin</p>
                    </div>
                </div>
                <!-- ===================== -->
                <div class="biodata">
                        <table class="bio">
                            <tr>
                                <td class="left-bio">Nama Lengkap</td>
                                <td class="right-bio">: {{ $nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td class="left-bio">NIP</td>
                                <td class="right-bio">: 200105172020032003</td>
                            </tr>
                            <tr>
                                <td class="left-bio">Email</td>
                                <td class="right-bio">: {{ $email }}</td>
                            </tr>
                            <tr>
                                <td class="left-bio">Jenis Kelamin</td>
                                <td class="right-bio">: {{ $gender }}</td>
                            </tr>
                            <tr>
                                <td class="left-bio">No. Handphone</td>
                                <td class="right-bio">: {{ $nomor_telepon }}</td>
                            </tr>
                            <tr style="border: none;">
                                <td class="left-bio">Alamat</td>
                                <td class="right-bio">: {{$alamat}}</td>
                            </tr>         
                        </table>
                        <div class="button">
                        <button class="btn-bio">Edit Profil</button>
                        </div>
                </div>

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
    <script src="/js/script.js"></script>
    <script src="/js/modal.js"></script>
</body>
</html>