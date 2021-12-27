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
                <div class="edit ms-5 mt-5 w-75">
                    <table class="edit-td" style="width: 100%;">
                        <h3>Keadaan Jalan</h3>
                        @foreach ($jalan as $item)
                            <tr>
                                <td class="kolom">{{ $item->jenis }}
                                    <div class="btn">
                                        <button class="btn btn-warning me-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal2"><a
                                                href="/pengaturan/edit-data-survey/ubah/{{ $item->id }}"><i
                                                    class="far fa-edit"></i>Edit</a></button>
                                        <button class="btn btn-danger"><a
                                                href="/pengaturan/edit-data-survey/jalan/hapus/{{ $item->id }}"><i
                                                    class="far fa-trash-alt"></i>Hapus</a></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </form>

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
                <div class="edit ms-5 mt-5 w-75">
                    <table class="edit-td" style="width: 100%;">
                        <h3>Kondisi Saluran</h3>
                        @foreach ($saluran as $item)
                            <tr>
                                <td class="kolom">{{ $item->jenis }}
                                    <div class="btn">
                                        <button class="btn btn-warning me-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal2"><a
                                                href="/pengaturan/edit-data-survey/ubah/{{ $item->id }}"><i
                                                    class="far fa-edit"></i>Edit</a></button>
                                        <button class="btn btn-danger"><a
                                                href="/pengaturan/edit-data-survey/saluran/hapus/{{ $item->id }}"><i
                                                    class="far fa-trash-alt"></i>Hapus</a></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </form>

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
                <div class="edit ms-5 mt-5 w-75">
                    <table class="edit-td" style="width: 100%;">
                        <h3>Jenis Fasos</h3>
                        @foreach ($sosial as $item)
                            <tr>
                                <td class="kolom">{{ $item->jenis }}
                                    <div class="btn">
                                        <button class="btn btn-warning me-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal2"><a
                                                href="/pengaturan/edit-data-survey/ubah/{{ $item->id }}"><i
                                                    class="far fa-edit"></i>Edit</a></button>
                                        <button class="btn btn-danger"><a
                                                href="/pengaturan/edit-data-survey/fasos/hapus/{{ $item->id }}"><i
                                                    class="far fa-trash-alt"></i>Hapus</a></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </form>

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
                <div class="edit ms-5 mt-5 w-75">
                    <table class="edit-td" style="width: 100%;">
                        <h3>Jenis Fasos</h3>
                        @foreach ($lampiran as $item)
                            <tr>
                                <td class="kolom">{{ $item->jenis }}
                                    <div class="btn">
                                        <button class="btn btn-warning me-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal2"><a
                                                href="/pengaturan/edit-data-survey/ubah/{{ $item->id }}"><i
                                                    class="far fa-edit"></i>Edit</a></button>
                                        <button class="btn btn-danger"><a
                                                href="/pengaturan/edit-data-survey/lampiran/hapus/{{ $item->id }}"><i
                                                    class="far fa-trash-alt"></i>Hapus</a></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 position-relative">
                <div class="modal-body second align-items-center w-100 ps-5 pe-5">
                    <input type="text" id="modal2" class="w-100 mb-4 mt-5 ps-3 pe-3" autocomplete="off">
                </div>

                <div class="choose d-flex justify-content-center gap-5 mb-5">
                    <button type="button" class="btn btn-secondary btn-lg ps-4 pe-4 shadow-none border-0" id="batal"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-secondary btn-lg ps-3 pe-3 shadow-none border-0"
                        id="simpan">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection
