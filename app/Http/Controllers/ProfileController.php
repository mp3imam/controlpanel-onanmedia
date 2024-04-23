<?php

namespace App\Http\Controllers;

use App\Models\DataKaryawanModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    private $title = 'Data Profile';
    private $li_1 = 'Index';

    public function index()
    {
        $title['title'] = $this->title;
        $title['li_1'] = $this->li_1;

        $detail = DataKaryawanModel::whereId(auth()->user()->id)->first();

        return view('profile.index', $title, compact(['detail']));
    }

    public function simpan_umum(Request $request)
    {
        $id_update = auth()->user()->id;
        $validasi = [
            'nameInput'  => 'required',
            'email'      => 'required|email|unique:data_karyawan,email,' . $id_update,
            'no_telp'    => 'required'
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }

        DB::beginTransaction();
        try {
            $data = [
                'nama_lengkap' => $request->nameInput,
                'username' => $request->nameInput,
            ];

            if ($file = $request->file('foto')) {
                $imageName = Carbon::now()->format('H:i:s') . '_' . uniqid() . '.' . $file->extension();
                $path = public_path('karyawan/foto/');
                $file->move($path, $imageName);

                $data += ['foto' => asset('karyawan/foto/') . "/" . $imageName];
            }

            User::whereId($id_update)->update($data);

            $data = [
                'nama_lengkap' => $request->nameInput,
                'nik_khusus' => $request->nik_khusus ?? '-',
                'agama_id' => $request->agama_id,
                'tanggal_lahir' => Carbon::parse($request->tanggal_lahir)->format('Y-m-d'),
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'no_handphone' => $request->no_telp,
            ];

            DataKaryawanModel::whereId($id_update)->update($data);
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();

            return response()->json([
                'status'  => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $th
            ]);
        }

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => 'Data Tersimpan'
        ]);
    }

    public function simpan_medsos(Request $request)
    {
        $data = [
            'linkedin' => $request->linkedin,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'website' => $request->web_fortofolio,
        ];

        DataKaryawanModel::whereId(auth()->user()->id)->update($data);

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => 'Data Tersimpan'
        ]);
    }

    public function simpan_password(Request $request)
    {
        $validasi = [
            'pass_lama'             => 'required',
            'password'              => 'required|confirmed|min:6|max:50',
            'password_confirmation' => 'required|min:6|max:50'
        ];

        $validator = Validator::make($request->all(), $validasi);

        if ($validator->fails()) {
            return response()->json([
                'status'  => Response::HTTP_BAD_REQUEST,
                'message' => $validator->messages()
            ]);
        }


        $user = User::whereId(auth()->user()->id)->first();
        // dd($user, $request->pass_lama, Hash::check($request->pass_lama, $user->password));

        // Memeriksa apakah password lama cocok
        if (!Hash::check($request->pass_lama, $user->password)) {
            return response()->json([
                'status'  => Response::HTTP_CONFLICT,
                'message' => 'Password lama tidak cocok'
            ]);
        }

        // Jika password lama cocok, update password baru
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status'  => Response::HTTP_OK,
            'message' => 'Data Tersimpan'
        ]);
    }
}