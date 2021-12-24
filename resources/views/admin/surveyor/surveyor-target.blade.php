@extends('/admin/main')
@section('main-content')
    <div class="content">
        <div class="admin-hl">
            <h1>Profile Surveyor</h1>
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
            <form action="" method="POST">
                @csrf
                <select name="kecamatan" id="kecamatan">
                    @foreach ($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                    @endforeach
                </select><br>
                <select name="kategori" id="kategori">
                    <option value="">Per-Hari</option>
                </select><br>
                <input type="date" name="tanggal" id="datePicker"><br>
                <input type="number" name="jmlTarget" value="10"> Gang dan Perumahan<br>
                <div class="button">
                    <button class="btn-bio" type="submit">Save</button>
                </div>
            </form>
        </div>

    </div>
    <script>
        document.getElementById('datePicker').valueAsDate = new Date();
    </script>
@endsection
