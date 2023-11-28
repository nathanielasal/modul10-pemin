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


}
