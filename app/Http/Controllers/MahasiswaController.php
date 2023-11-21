<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
Use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function createMahasiswa(Request $request) //register
    {
        $mahasiswa = Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'prodiId' => $request->prodiId,
            'password'=> Hash::make($request->password),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'New mahasiswa created',
            'data' => [
                'mahasiswa' => $mahasiswa,
            ],
        ], 200);
    }

    public function getAllMahasiswa() //get semua mahasiswa
    {
        // $mahasiswa = Mahasiswa::all()->load('prodi');
        $mahasiswa = Mahasiswa::with('prodi')->get();
        return response()->json([
            'status' => 'Success',
            'message' => 'all mahasiswa grabbed',
            'data' => $mahasiswa,
        ], 200);
    }

    public function getMahasiswaByToken(Request $request) //GET mahasiswa/profile [tunggu token dr endpoint login]
    {
        return response()->json([
        'success' => true,
        'message' => 'grabbed user by token',
        'user' => $request->user,
        ], 200);
    }

    //
}
