<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\DataSurvey;
use App\Models\JenisFasos;
use App\Models\LampiranFoto;
use Illuminate\Http\Request;
use App\Models\DetailSurveys;
use App\Models\JenisLampiran;
use App\Http\Controllers\Controller;
use App\Models\JenisKonstruksiJalan;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\AssignOp\Mod;
use App\Models\JenisKonstruksiSaluran;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function beranda()
    {

        $data = [
            'title' => 'Beranda',
            'profile' => User::where('role', 'admin')->get(['nama_lengkap', 'gender', 'alamat', 'nomor_telepon', 'email', 'role', 'avatar'])[0],
            'kabupaten' => Kabupaten::get(['id', 'nama']),
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
            'nama_lengkap' => ['required'],
            'alamat' => ['required'],
            'tanggal_lahir' => ['required']
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
            'profile' => User::where('role', 'admin')->get(['nama_lengkap', 'avatar'])[0],
            'surveyors' => User::where('role', 'surveyor')->get()
        ]);
    }

    public function surveyorProfile($id)
    {
        $data = User::with(['detailSurvey.kecamatan', 'kabupaten'])->where('id', $id)->where('role', 'surveyor')->get();
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
            'detailSurvey' => $data[0]->detailSurvey,
            'area' => $data[0]->kabupaten
        ];
        return view('admin.surveyor.surveyor-profile', $detail);
    }

    public function showSurveyorTarget($id)
    {
        $user = User::with('kabupaten.kecamatan')->find($id);
        $detail = [
            'title' => 'Surveyor - Target',
            'profile' => User::where('role', 'admin')->get()[0],
            'profile_surveyor' => $user,
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
        ]);

        User::create([
            "nama_lengkap" => $request->nama_lengkap,
            "nomor_telepon" => $request->nomor_telepon,
            "email" => $request->email,
            "kabupaten_id" => $request->area,
            "password" => Hash::make('surveyor')

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
    public function destroySuyveyor(Request $request)
    {
        User::destroy($request->id);
        return redirect('/surveyor')->with('success', 'Akun has been deleted!');
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
                $data->validate([
                    'jalan' => ['required', 'unique:jenis_konstruksi_jalans,jenis', 'alpha']
                ]);

                JenisKonstruksiJalan::create([
                    "jenis" => $data->jalan,
                ]);
                break;
            case 'saluran':
                $data->validate([
                    'saluran' => ['required', 'unique:jenis_konstruksi_salurans,jenis', 'alpha']
                ]);

                JenisKonstruksiSaluran::create([
                    "jenis" => $data->saluran,
                ]);
                break;
            case 'fasos':
                $data->validate([
                    'fasos' => ['required', 'unique:jenis_fasos,jenis', 'alpha']
                ]);

                JenisFasos::create([
                    "jenis" => $data->fasos,
                ]);
                break;
            case 'lampiran':
                $data->validate([
                    'lampiran' => ['required', 'unique:jenis_lampirans,jenis', 'alpha']
                ]);

                // if ($data->lampiran == '') return redirect('/pengaturan/edit-data-survey');
                JenisLampiran::create([
                    "jenis" => $data->lampiran,
                ]);
                break;
            default:
                return redirect('/pengaturan/edit-data-survey');
        };

        return redirect('/pengaturan/edit-data-survey')->withInput();
    }
    public function editData(Request $request)
    {
        switch ($request->target) {
            case 'jalan':
                JenisKonstruksiJalan::where('id', $request->id)->update([
                    'jenis' => $request->jenis
                ]);
                break;
            case 'saluran':
                JenisKonstruksiSaluran::where('id', $request->id)->update([
                    'jenis' => $request->jenis
                ]);
                break;
            case 'fasos':
                JenisFasos::where('id', $request->id)->update([
                    'jenis' => $request->jenis
                ]);
                break;
            case 'lampiran':
                JenisLampiran::where('id', $request->id)->update([
                    'jenis' => $request->jenis
                ]);
                break;
            default:
                return redirect()->back();
        };

        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        switch ($request->model) {
            case 'jalan':
                JenisKonstruksiJalan::destroy($request->id);
                break;
            case 'saluran':
                JenisKonstruksiSaluran::destroy($request->id);
                break;
            case 'fasos':
                JenisFasos::destroy($request->id);
                break;
            case 'lampiran':
                JenisLampiran::destroy($request->id);
                break;
            default:
                return redirect()->back();
        };

        return redirect('/pengaturan/edit-data-survey')->with('success', 'Data has been deleted!');
    }

    public function ubahPassword(Request $request)
    {
        return view('admin.pengaturan.ubah-password', [
            'title' => 'Pengaturan - Ubah Password',
            'profile' => User::where('role', 'admin')->get()[0],
        ]);
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'min:8'],
            'new_password' => ['required', 'min:8', 'confirmed'],
            'new_password_confirmation' => ['required', 'min:8']
        ]);

        $admin = User::where('role', 'admin')->get()[0];

        $currentPassword = $admin->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $currentPassword)) {
            $admin->update([
                'password' => Hash::make($request->new_password)
            ]);
        } else {
            return back()->withErrors(['old_password' => 'Your password does not match the current password!']);
        }


        return redirect('/pengaturan')->withInput();
    }

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

    public function dataSurvei()
    {
        // $data = DataSurvey::with('kecamatan')->where('kecamatan_id', 160)->get();
        // dd($data);
        // $data = $datas[12]->kecamatan[5]->dataSurvey;
        // dd($data);
        return view('admin.data-survei', [
            'title' => 'Data Survei',
            'profile' => User::where('role', 'admin')->get(['nama_lengkap', 'avatar'])[0],
            'kabupaten' => Kabupaten::get(['id', 'nama'])
        ]);
    }

    public function detailDataSurvei(Request $request)
    {
        $data = DataSurvey::where('id', $request->id)->get();
        // dd($data);

        return view('admin.data-survei.detail-data-survei', [
            'title' => 'Data Survei',
            'profile' => User::where('role', 'admin')->get(['nama_lengkap', 'avatar'])[0],
            'data' => $data[0]
        ]);
    }
}
