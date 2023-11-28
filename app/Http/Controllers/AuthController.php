<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function register(Request $request) //register -- dikerjakan oleh Shafa Nathaniela Salwa
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
            'mahasiswa' => $mahasiswa,
        ], 200);
    }
}


