<?php

namespace App\Http\Controllers;

use App\Models\RiwayatSurvey;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function profile($id)
    {
        $profile = User::where('id', $id)->get(['nama_lengkap', 'gender', 'alamat', 'nomor_telepon', 'email', 'role']);
        return view('profile', $profile[0]);
    }

    public function surveyor()
    {
        return view('surveyor', [
            'surveyors' => User::all()
        ]);
    }

    public function surveyorProfile($id)
    {
        $data = User::with('riwayatSurvey')->where('id', $id)->get();
        $detail = [
            'riwayatSurvey' => $data[0],
        ];
        dd($detail);
        // dd($data);
        // $surveyorProfile = User::where('id', $id)->get();
        // $riwayatSurvey = RiwayatSurvey::where('users_id', $id)->get();
        // return view('surveyorProfile', [
        // 'surveyorProfile' => $data[0]->user,
        // 'riwayatSurvey' => $data[0],
        // 'perhitungan' => $riwayatSurvey[0]->selesai - $riwayatSurvey[0]->target
        // ]);
    }

    public function store(Request $request)
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
}
