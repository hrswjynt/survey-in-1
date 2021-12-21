<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SurveyorController extends Controller
{
    public function profile($id)
    {
        $profile = User::where('id', $id)->get();
        return view('profile', $profile[0]);
    }
}
