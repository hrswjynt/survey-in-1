<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    public function getKecamatan($id = 13)
    {
        $kecamatan = Kecamatan::where('kabupaten_id', $id)->get(['id', 'nama']);
        $response = [
            'message' => 'List of kecamatan',
            'data' => $kecamatan
        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
