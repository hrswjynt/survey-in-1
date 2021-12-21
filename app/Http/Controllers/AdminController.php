<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function profile($id)
    {
        $profile = User::where('id', $id)->get(['nama_lengkap', 'gender', 'alamat', 'nomor_telepon', 'email','role']);
        return view('profile', $profile[0]);
    }
}
