<?php

namespace App\Http\Controllers;

use App\Models\DetailSurvey;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function profile($id)
    {
        $profile = User::where('id', $id)->get(['nama_lengkap', 'gender', 'alamat', 'nomor_telepon', 'email', 'role']);
        return view('/admin/profile', $profile[0]);
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
            'surveyorProfile' => $data[0],
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
            'email' => ['required', 'email', 'unique:users',]
        ]);

        User::create([
            "nama_lengkap" => $request->nama_lengkap,
            "nomor_telepon" => $request->nomor_telepon,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return redirect('/surveyor')->withInput();
    }

    // Halaman Pengaturan Admin
    public function pengaturan()
    {
        return view('/admin/pengaturan', []);
    }

    public function editDataSurvey()
    {
        return view('/admin/pengaturan/edit-data-survey', []);
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
