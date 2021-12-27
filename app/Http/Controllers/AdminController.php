<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\DataSurvey;
use App\Models\JenisFasos;
use Illuminate\Http\Request;
use App\Models\JenisLampiran;
use App\Http\Controllers\Controller;
use App\Models\DetailSurveys;
use App\Models\JenisKonstruksiJalan;
use Illuminate\Support\Facades\Hash;
use App\Models\JenisKonstruksiSaluran;
use App\Models\LampiranFoto;
use PhpParser\Node\Expr\AssignOp\Mod;

class AdminController extends Controller
{
    public function beranda()
    {
        $dataSurvey = DataSurvey::with('kecamatan')->where('kecamatan_id', 160)->get();
        $panjangJalan = 0;
        $lebarJalan = 0;
        $jumlahRumah = 0;
        $jalanJelek = 0;
        $jalanBaik = 0;
        foreach ($dataSurvey as $data) {
            $panjangJalan = $panjangJalan + $data->dimensi_jalan_panjang;
            $lebarJalan = $panjangJalan + $data->dimensi_jalan_lebar;
            $jumlahRumah = $jumlahRumah + ($data->jumlah_rumah_layak + $data->jumlah_rumah_kosong + $data->jumlah_rumah_tak_layak);
            if ($data->status_jalan < 51) {
                $jalanJelek = $jalanJelek + $data->status_jalan;
            } else {
                $jalanBaik =  $jalanBaik + $data->status_jalan;
            }
        }
        $data = [
            'title' => 'Beranda',
            'profile' => User::where('role', 'admin')->get(['nama_lengkap', 'gender', 'alamat', 'nomor_telepon', 'email', 'role', 'avatar'])[0],
            'kabupaten' => Kabupaten::get(['id', 'nama']),
            'jumlah' => $dataSurvey->count(),
            'jumlahRumah' => $jumlahRumah,
            'panjangJalan' => $panjangJalan,
            'lebarJalan' => $lebarJalan,
            'jalanJelek' => round(($jalanJelek / ($jalanBaik + $jalanJelek)) * 100, 2),
            'jalanBaik' => round(($jalanBaik / ($jalanBaik + $jalanJelek)) * 100, 2)
        ];
        return view('admin.beranda', $data);
    }
    public function profile()
    {
        $data = [
            'title' => 'Profile-Page',
            'profile' => User::where('role', 'admin')->get()[0]
        ];
        return view('admin.profile', $data);
    }
    public function profileEdit()
    {
        $data = [
            'title' => 'Profile-Page',
            'profile' => User::where('role', 'admin')->get()[0]
        ];
        return view('admin.edit-profile', $data);
    }
    public function profileUpdate(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required'],
            'nomor_telepon' => ['required'],
            'email' => ['required'],
            'nama_lengkap' => ['required']
        ]);
        User::where('id', $request->id)
            ->update([
                'nama_lengkap' => $request->nama_lengkap,
                'gender' => $request->gender,
                'email' => $request->email,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nomor_telepon' => $request->nomor_telepon,
                'alamat' => $request->alamat
            ]);
        return redirect('/profile')->withInput();
    }
    public function surveyor()
    {

        return view('admin.surveyor', [
            'title' => 'Surveyor',
            'surveyors' => User::where('role', 'surveyor')->get()
        ]);
    }

    public function surveyorProfile($id)
    {
        $data = User::with(['detailSurvey', 'kabupaten'])->where('id', $id)->where('role', 'surveyor')->get();
        $selesai = 0;
        $target = 0;
        foreach ($data[0]->detailSurvey as $hasil) {
            $selesai = $selesai + $hasil->selesai;
            $target = $target + $hasil->target;
        }

        $detail = [
            'title' => 'Surveyor - Profile',
            'profile' => $data[0],
            'selesai' => $selesai,
            'target' => $target,
            'area' => $data[0]->kabupaten
        ];
        return view('admin.surveyor.surveyor-profile', $detail);
    }

    public function riwayat($id)
    {
        $data = User::with('detailSurvey.kecamatan')->where('id', $id)->where('role', 'surveyor')->get();

        $detail = [
            'title' => 'Surveyor - Riwayat',
            'profile' => $data[0]->nama_lengkap,
            'detailSurvey' => $data[0]->detailSurvey
        ];
        return view('admin.surveyor.riwayat', $detail);
    }

    public function showSurveyorTarget($id)
    {
        $user = User::with('kabupaten.kecamatan')->find($id);
        $detail = [
            'title' => 'Surveyor - Target',
            'profile' => $user,
            'kecamatans' => $user->kabupaten->kecamatan
        ];
        // dd($detail);
        return view('admin.surveyor.surveyor-target', $detail);
    }

    public function addSurveyorTarget(Request $request)
    {

        DetailSurveys::create([
            'user_id' => $request->id,
            'kecamatan_id' => $request->kecamatan,
            'tanggal' => $request->tanggal,
            'target' => $request->jmlTarget
        ]);

        return redirect('/surveyor')->withInput();
    }

    public function tambahSurveyor(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'max:255'],
            'nomor_telepon' => ['required', 'numeric', 'unique:users'],
            'area' => ['required'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:8']
        ]);

        User::create([
            "nama_lengkap" => $request->nama_lengkap,
            "nomor_telepon" => $request->nomor_telepon,
            "email" => $request->email,
            "kabupaten_id" => $request->area,
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
            'area' => ['required']
        ]);
        User::where('id', $request->id)
            ->update([
                "nama_lengkap" => $request->nama_lengkap,
                "nomor_telepon" => $request->nomor_telepon,
                "email" => $request->email,
                'kabupaten_id' => $request->area,
                "password" => ($request == '') ? $request->oldPassword : Hash::make($request->password)
            ]);


        return redirect('/surveyor')->withInput();
    }

    public function getSurveyor($id)
    {
        $data = [
            'title' => 'Surveyor - Profile',
            'profile' => User::with('kabupaten')->where('id', $id)->get(['id', 'nama_lengkap', 'nomor_telepon', 'email', 'password', 'kabupaten_id'])[0],
            'kabupaten' => Kabupaten::all('id', 'nama')
        ];
        return view('admin.surveyor.edit', $data);
    }

    // Halaman Pengaturan Admin
    public function pengaturan()
    {
        return view('admin.pengaturan', [
            'title' => 'Pengaturan',
            'profile' => User::where('role', 'admin')->get(['nama_lengkap', 'avatar'])[0]
        ]);
    }

    public function editDataSurvey()
    {
        return view('admin.pengaturan.edit-data-survey', [
            'title' => 'Pengaturan-Edit Data',
            'profile' => User::where('role', 'admin')->get(['nama_lengkap', 'avatar'])[0],
            'jalan' => JenisKonstruksiJalan::all(),
            'saluran' => JenisKonstruksiSaluran::all(),
            'sosial' => JenisFasos::all(),
            'lampiran' => JenisLampiran::all(),
        ]);
    }
    public function tambahJenisJalan(Request $request)
    {
        if ($request->jalan != '') {
            JenisKonstruksiJalan::create([
                "jenis" => $request->jalan,
            ]);
            return redirect('/pengaturan/edit-data-survey')->withInput();
        } else {
        }
    }
    public function createData($model, Request $data)
    {
        switch ($model) {
            case 'jalan':
                if ($data->jalan == '') return redirect('/pengaturan/edit-data-survey');
                JenisKonstruksiJalan::create([
                    "jenis" => $data->jalan,
                ]);
                break;
            case 'saluran':
                if ($data->saluran == '') return redirect('/pengaturan/edit-data-survey');
                JenisKonstruksiSaluran::create([
                    "jenis" => $data->saluran,
                ]);
                break;
            case 'fasos':
                if ($data->fasos == '') return redirect('/pengaturan/edit-data-survey');
                JenisFasos::create([
                    "jenis" => $data->fasos,
                ]);
                break;
            case 'lampiran':
                if ($data->lampiran == '') return redirect('/pengaturan/edit-data-survey');
                JenisLampiran::create([
                    "jenis" => $data->lampiran,
                ]);
                break;
            default:
                return redirect('/pengaturan/edit-data-survey');
        };

        return redirect('/pengaturan/edit-data-survey')->withInput();
    }
    public function destroy($model, $id)
    {
        switch ($model) {
            case 'jalan':
                JenisKonstruksiJalan::destroy($id);
                break;
            case 'saluran':
                JenisKonstruksiSaluran::destroy($id);
                break;
            case 'fasos':
                JenisFasos::destroy($id);
                break;
            case 'lampiran':
                JenisLampiran::destroy($id);
                break;
            case 'user':
                User::destroy($id);
                return redirect('/surveyor')->with('success', 'Akun has been deleted!');

            default:
                return redirect()->back();
        };

        return redirect('/pengaturan/edit-data-survey')->with('success', 'Data has been deleted!');
    }

    public function ubahPassword()
    {
        return view('admin.pengaturan.ubah-password', [
            'title' => 'Pengaturan - Ubah Password',
            'profile' => User::where('role', 'admin')->get(['nama_lengkap', 'avatar'])[0],
        ]);
    }

    // public function editSurveyor($id)
    // {
    //     $profile = User::where('id', $id)->get(['nama_lengkap', 'nomor_telepon', 'email',]);
    //     return view('admin.surveyor.edit', [
    //         'title' => 'Surveyor - Profile',
    //         'profile' => $profile[0]
    //     ]);
    // }
}
