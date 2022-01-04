<?php
    
    
    // public function editSurveyor($id)
    // {
    //     $profile = User::where('id', $id)->get(['nama_lengkap', 'nomor_telepon', 'email',]);
    //     return view('admin.surveyor.edit', [
    //         'title' => 'Surveyor - Profile',
    //         'profile' => $profile[0]
    //     ]);
    // }

    // Halaman data survei
    // public function getData(Request $request)
    // {
    //     $datas = Kabupaten::with('dataSurvey.user')->get();

    //     if ($request->id_kabupaten) {
    //         $data = $datas[$request->id_kabupaten - 1]->kecamatan;
    //     }
    //     if ($request->id_kecamatan) {
    //         $data = $datas[$request->id_kabupaten - 1]->kecamatan[$request->id_kecamatan]->dataSurvey->load('user');
    //     }
    //     return response()->json($data);
    // }
