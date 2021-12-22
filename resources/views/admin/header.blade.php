<div class="header">
    <div class="subhead-a">
        <h1>Profile</h1>
    </div>
    <div class="subhead-b">
        <p>{{ ucwords($profile->nama_lengkap) }}</p>
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