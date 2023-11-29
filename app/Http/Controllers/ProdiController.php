<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
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

    public function getAllProdi() //get semua prodi -- dikerjakan oleh Ranatika Putri Aulia
    {
        $prodi = Prodi::all();

        return response()->json([
            'success' => true,
            'message' => 'All prodi grabbed',
            'prodi' => $prodi
        ], 200);
    }
}
