<?php

namespace App\Http\Controllers;

use App\Models\DataSurvey;
use App\Models\JenisFasos;
use App\Models\JenisKonstruksiJalan;
use App\Models\JenisKonstruksiSaluran;
use App\Models\JenisLampiran;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function profile()
    {
        $data = [
            'profile' => User::where('role', 'admin')->get(['nama_lengkap', 'gender', 'alamat', 'nomor_telepon', 'email', 'role'])[0]
        ];
        return view('/admin/profile', $data);
    }

    public function surveyor()
    {
        return view('/admin/surveyor', [
            'surveyors' => User::where('role', 'surveyor')->get()
        ]);
    }

    public function surveyorProfile($id)
    {
        $data = User::with('detailSurvey')->where('id', $id)->where('role', 'surveyor')->get();
        $selesai = 0;
        $target = 0;
        foreach ($data[0]->detailSurvey as $hasil) {
            $selesai = $selesai + $hasil->selesai;
            $target = $target + $hasil->target;
        }

        $detail = [
            'profile' => $data[0],
            'selesai' => $selesai,
            'target' => $target
        ];
        return view('/admin/surveyor/surveyor-profile', $detail);
    }

    public function tambahSurveyor(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'max:255'],
            'nomor_telepon' => ['required', 'numeric', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8']
        ]);

        User::create([
            "nama_lengkap" => $request->nama_lengkap,
            "nomor_telepon" => $request->nomor_telepon,
            "email" => $request->email,
            "password" => Hash::make($request->password)

        ]);

        return redirect('/surveyor')->withInput();
    }
    public function updateSurveyor(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required'],
            'nomor_telepon' => ['required'],
            'email' => ['required'],
        ]);
        dump(Hash::check('password', $request->oldPassword)) ? $request->oldPassword : Hash::make($request->password);
        // dd([
        //     "nama_lengkap" => $request->nama_lengkap,
        //     "nomor_telepon" => $request->nomor_telepon,
        //     "email" => $request->email,
        //     "password" => (Hash::check($request->password, $request->oldPassword)) ? $request->oldPassword : Hash::make($request->password)
        // ]);
        User::where('id', $request->id)
            ->update([
                "nama_lengkap" => $request->nama_lengkap,
                "nomor_telepon" => $request->nomor_telepon,
                "email" => $request->email,
                "password" => ($request == '') ? $request->oldPassword : Hash::make($request->password)
            ]);


        return redirect('/surveyor')->withInput();
    }
    public function getSurveyor($id)
    {
        $profile = User::where('id', $id)->get(['id', 'nama_lengkap', 'nomor_telepon', 'email', 'password']);
        return view('/admin/surveyor/edit', $profile[0]);
    }

    // Halaman Pengaturan Admin
    public function pengaturan()
    {
        return view('/admin/pengaturan', []);
    }

    public function editDataSurvey()
    {
        return view('/admin/pengaturan/edit-data-survey', [
            'jalan' => JenisKonstruksiJalan::all(),
            'saluran' => JenisKonstruksiSaluran::all(),
            'sosial' => JenisFasos::all(),
            'lampiran' => JenisLampiran::all(),
        ]);
    }

    public function ubahPassword()
    {
        return view('/admin/pengaturan/ubah-password', []);
    }

    public function editSurveyor($id)
    {
        $profile = User::where('id', $id)->get(['nama_lengkap', 'nomor_telepon', 'email',]);
        return view('/admin/surveyor/edit', $profile[0]);
    }
}
