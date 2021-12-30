@extends('admin.main')
@section('main-content')
@include('admin.header')
<div class="content d-flex flex-column" id="set-content">
    <div class="admin-hl mt-4">
        <h1>Edit Input Data Survei</h1>
        <p>Edit atau tambah input data survei di sini</p>
    </div>

    <div class="tambah-data d-flex flex-column w-75 mt-5 flex-wrap">
        <form action="/pengaturan/edit-data-survey/jalan/tambah" method="post" id="form-jalan"
            class="data first needs-validation ms-3" novalidate>
            @csrf
            <div class="data d-flex ms-5 align-items-center">
                <div class="col-md-6">
                    <label for="validationServer01" class="form-label">Kondisi Jalan :</label>
                    <input type="text" class="form-control is-invalid" name="jalan" id="jalan"
                        aria-describedby="validationServer01Feedback" required>
                    <div id="validationServer01Feedback" class="invalid-feedback">
                        Harap berikan data yang valid.
                    </div>
                </div>
                <button class="btn btn-primary ms-5 mt-2 submit" form="form-jalan" type="submit">+ Tambah</button>
            </div>
        </form>
        <div class="edit ms-5 mt-5 w-75">
            <table class="edit-td" style="width: 100%;">
                <h3>Keadaan Jalan</h3>
                @foreach ($jalan as $item)
                <tr>
                    <td class="kolom"><span>{{ $item->jenis }}</span>
                        <div id="jalan">
                            <button class="btn btn-warning me-2  btn-edit text-light" data-bs-toggle="modal"
                                data-bs-target="#modal-edit" data-model="jalan" value="{{ $item->id }}">
                                <i class="far fa-edit"></i>Edit
                            </button>
                            <button class="btn btn-danger">
                                <a href="/pengaturan/edit-data-survey/jalan/hapus/{{ $item->id }}"><i
                                        class="far fa-trash-alt"></i>Hapus</a>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- ====================== -->

        <form action="/pengaturan/edit-data-survey/saluran/tambah" method="post" id="form-saluran"
            class="data first needs-validation ms-3" novalidate>
            @csrf
            <div class="data d-flex ms-5 align-items-center">
                <div class="col-md-6">
                    <label for="validationServer01" class="form-label">Kondisi Jalan :</label>
                    <input type="text" class="form-control is-invalid" name="saluran" id="saluran"
                        aria-describedby="validationServer01Feedback" required>
                    <div id="validationServer01Feedback" class="invalid-feedback">
                        Harap berikan data yang valid.
                    </div>
                </div>
                <button class="btn btn-primary ms-5 mt-2 submit" form="form-saluran" type="submit">+ Tambah</button>
            </div>
        </form>
        <div class="edit ms-5 mt-5 w-75">
            <table class="edit-td" style="width: 100%;">
                <h3>Kondisi Saluran</h3>
                @foreach ($saluran as $item)
                <tr>
                    <td class="kolom"><span>{{ $item->jenis }}</span>
                        <div id="saluran">
                            <button class="btn btn-warning me-2 text-light  btn-edit" data-bs-toggle="modal"
                                data-bs-target="#modal-edit" data-model="saluran" value="{{ $item->id }}"><i
                                    class="far fa-edit"></i>Edit</button>
                            <button class="btn btn-danger"><a
                                    href="/pengaturan/edit-data-survey/saluran/hapus/{{ $item->id }}"><i
                                        class="far fa-trash-alt"></i>Hapus</a></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- ====================== -->

        <form action="/pengaturan/edit-data-survey/fasos/tambah" method="post" id="form-fasos"
            class="data first needs-validation ms-3" novalidate>
            @csrf
            <div class="data d-flex ms-5 align-items-center">
                <div class="col-md-6">
                    <label for="validationServer01" class="form-label">Kondisi Jalan :</label>
                    <input type="text" class="form-control is-invalid" name="fasos" id="fasos"
                        aria-describedby="validationServer01Feedback" required>
                    <div id="validationServer01Feedback" class="invalid-feedback">
                        Harap berikan data yang valid.
                    </div>
                </div>
                <button class="btn btn-primary ms-5 mt-2 submit" form="form-fasos" type="submit">+ Tambah</button>
            </div>
        </form>
        <div class="edit ms-5 mt-5 w-75">
            <table class="edit-td" style="width: 100%;">
                <h3>Jenis Fasos</h3>
                @foreach ($sosial as $item)
                <tr>
                    <td class="kolom"><span>{{ $item->jenis }}</span>
                        <div id="fasos">
                            <button class="btn btn-warning me-2 text-light  btn-edit" data-bs-toggle="modal"
                                data-bs-target="#modal-edit" data-model="fasos" value="{{ $item->id }}"><i
                                    class="far fa-edit"></i>Edit</button>
                            <button class="btn btn-danger"><a
                                    href="/pengaturan/edit-data-survey/fasos/hapus/{{ $item->id }}"><i
                                        class="far fa-trash-alt"></i>Hapus</a></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        <!-- ====================== -->

        <form action="/pengaturan/edit-data-survey/lampiran/tambah" method="post" id="form-lampiran"
            class="data first needs-validation ms-3" novalidate>
            @csrf
            <div class="data d-flex ms-5 align-items-center">
                <div class="col-md-6">
                    <label for="validationServer01" class="form-label">Kondisi Jalan :</label>
                    <input type="text" class="form-control is-invalid" name="lampiran" id="lampiran"
                        aria-describedby="validationServer01Feedback" required>
                    <div id="validationServer01Feedback" class="invalid-feedback">
                        Harap berikan data yang valid.
                    </div>
                </div>
                <button class="btn btn-primary ms-5 mt-2 submit" form="form-lampiran" type="submit">+ Tambah</button>
            </div>
        </form>
        <div class="edit ms-5 mt-5 w-75">
            <table class="edit-td" style="width: 100%;">
                <h3>Jenis Fasos</h3>
                @foreach ($lampiran as $item)
                <tr>
                    <td class="kolom"><span>{{ $item->jenis }}</span>
                        <div>
                            <button class="btn btn-warning me-2 btn-edit text-light" data-bs-toggle="modal"
                                data-bs-target="#modal-edit" data-model="lampiran" value="{{ $item->id }}"><i
                                    class="far fa-edit"></i>Edit</button>
                            <button class="btn btn-danger"><a
                                    href="/pengaturan/edit-data-survey/lampiran/hapus/{{ $item->id }}"><i
                                        class="far fa-trash-alt"></i>Hapus</a></button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<!-- Modal 2 -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-edit-data" method="post" action="/pengaturan/edit-data-survey/">
            @csrf
            @method('put')
            <div class="modal-content border-0 position-relative">
                <div class="modal-body second align-items-center w-100 ps-5 pe-5">
                    <input type="hidden" name="target" id="target">
                    <input type="hidden" name="id" id="id">
                    <input type="text" id="jenis" class="w-100 mb-4 mt-5 ps-3 pe-3" autocomplete="off" name="jenis">
                </div>
                <div class="choose d-flex justify-content-center gap-5 mb-5">
                    <button type="button" class="btn btn-secondary btn-lg ps-4 pe-4 shadow-none border-0" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-secondary btn-lg ps-3 pe-3 shadow-none border-0"
                        id="simpan">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".btn-edit").click(function (e) {
            $('#id').attr('value', e.target.value);
            // $('#form-edit-data').attr('action', '/pengaturan/edit-data-survey/');
            $('#target').attr('value',$(this).parent().attr('id'));
            $('#jenis').attr('value',$(this).parent().siblings().text());
        });
    });
</script>
@endsection