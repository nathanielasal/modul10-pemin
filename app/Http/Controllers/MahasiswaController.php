<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
Use \Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function getAllMahasiswa() //get data semua mahasiswa -- dikerjakan oleh Shafa Nathaniela Salwa
    {
        // $mahasiswa = Mahasiswa::all()->load('prodi');
        $mahasiswa = Mahasiswa::with('prodi')->get();
        return response()->json([
            'status' => 'Success',
            'message' => 'all mahasiswa grabbed',
            'mahasiswa' => $mahasiswa,
        ], 200);
    }

    // get mahasiswa by token -- dikerjakan oleh Dzakiyyah Afifah Rahma
    public function getMahasiswaByToken(Request $request)
    {

        return response()->json([
            'status' => 'Berhasil',
            'message' => 'Berhasil diambil dari token',
            'mahasiswa' => $request->mahasiswa

        ], 200);
    }

    // get mahasiswa by NIM -- dikerjakan oleh Dzakiyyah Afifah Rahma
    public function getMahasiswaByNIM(Request $request, $nim)
    {

        $mahasiswa = Mahasiswa::where('nim', $nim)->with('prodi', 'matakuliah')->first();

        if ($mahasiswa) {
            return response()->json([
                'status' => 'Success',
                'message' => "Mahasiswa dengan nim $nim tertampil",
                'mahasiswa' => $mahasiswa,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Error',
                'message' => "Mahasiswa dengan nim $nim tidak ditemukan",
            ], 404);
        }
    }
}
