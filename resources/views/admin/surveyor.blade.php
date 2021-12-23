@extends('/admin/main')
@section('main-content')
    <div class="content">
        <h2 class="p-3 text-center shadow mb-5 bg-light">Daftar Surveyor</h2>
        <div class="biodata">
            <table class="bio">
                @foreach ($surveyors as $surveyor)
                    <tr>
                        <td class="right-bio">{{ $surveyor->nama_lengkap }}
                            <form action="/surveyor/hapus/{{ $surveyor->id }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger float-end ms-1"
                                    onclick="return confirm('Anda yakin ingin menghapus akun?')">Hapus</button>
                            </form>
                            <a href="/surveyor/edit/{{ $surveyor->id }}"
                                class="btn btn-warning text-light float-end ms-1">Edit</a>
                            <a href="/surveyor/profile/{{ $surveyor->id }}"
                                class="btn btn-danger float-end ms-1">Profil</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
