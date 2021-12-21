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
                    <li><a href="/"><span class="icon f"></span>Keluar</a></li>
                </ul>
            </div>
        </div>

        <!-- sidebar end -->


        <!-- Main Content -->
        <div class="main-content">
            {{-- @dd($profile) --}}
            <!-- Header -->

            <!-- Content -->
            <div class="content">
                <!-- ===================== -->
                <div class="biodata">
                    <table class="bio">
                        @foreach ($nama_lengkap as $nama)
                            <tr>
                                <td class="right-bio">: {{ $nama }} <a href="/surveyor/"
                                        class="btn-bio"></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
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
