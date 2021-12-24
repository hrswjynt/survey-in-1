@extends('/admin/main')
@section('main-content')
<div class="content">
    <h2 class="p-3 text-center shadow mb-5 bg-light">Daftar Surveyor</h2>
    <div class="biodata">
        <table class="bio">
            @foreach ($surveyors as $surveyor)
            <tr>
                <td class="right-bio">{{ $surveyor->nama_lengkap }}
                    <button class="btn btn-danger float-end ms-1"
                        onclick="return confirm('Anda yakin ingin menghapus akun?')"><a
                            href="/surveyor/user/hapus/{{ $surveyor->id }}">Hapus</a></button>
                    <a href="/surveyor/edit/{{ $surveyor->id }}"
                        class="btn btn-warning text-light float-end ms-1">Edit</a>
                    <a href="/surveyor/target/{{ $surveyor->id }}" class="btn btn-warning float-end ms-1">Target</a>
                    <a href="/surveyor/profile/{{ $surveyor->id }}" class="btn btn-danger float-end ms-1">Profil</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection