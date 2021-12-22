@extends('/admin/main')
@section('main-content')
@include('/admin/header');
    <div class="content">
        <div class="admin-hl">
            <h1>Profile Admin</h1>
            <p class="hl">Lengkapi data pribadi Anda dengan lengkap di bawah ini</p>
            <div class="admin-img">
                <div class="admin-foto">
                </div>
                <h2>{{ ucwords($profile->nama_lengkap) }}</h2>
                <p class="status">{{ $profile->role }}</p>
            </div>
        </div>
        <!-- ===================== -->
        <div class="biodata">
                <table class="bio">
                    <tr>
                        <td class="left-bio">Nama Lengkap</td>
                        <td class="right-bio">: {{ ucwords($profile->nama_lengkap) }}</td>
                    </tr>
                    <tr>
                        <td class="left-bio">NIP</td>
                        <td class="right-bio">: 200105172020032003</td>
                    </tr>
                    <tr>
                        <td class="left-bio">Email</td>
                        <td class="right-bio">: {{ $profile->email }}</td>
                    </tr>
                    <tr>
                        <td class="left-bio">Jenis Kelamin</td>
                        <td class="right-bio">: {{ ucwords($profile->gender) }}</td>
                    </tr>
                    <tr>
                        <td class="left-bio">No. Handphone</td>
                        <td class="right-bio">: {{ $profile->nomor_telepon }}</td>
                    </tr>
                    <tr style="border: none;">
                        <td class="left-bio">Alamat</td>
                        <td class="right-bio">: {{$profile->alamat}}</td>
                    </tr>         
                </table>
                <div class="button">
                <button class="btn-bio">Edit Profil</button>
            </div>
        </div>

    </div> 
@endsection