<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SurveyorController extends Controller
{
    public function profile($id)
    {
        $Data = [
            'profile' => User::where('id', $id)->get()
        ];
        return $Data;
    }
}
