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

    public function login(Request $request) //login -- dikerjakan oleh Dzakiyyah Afifah Rahma
    {
        $nim = $request->nim;
        $password = $request->password;

        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if(!$mahasiswa){
            return response()->json([
                'status' => 'Error',
                'message' => 'Mahasiswa not exist',
            ], 404);
        }
        
        if(!Hash::check($password, $mahasiswa->password)){
            return response()->json([
                'status' => 'Error',
                'message' => 'Wrong Password',
            ], 400); 
        }

        $jwt = $this->jwt(
            [
                'alg' => 'HS256',
                'typ' => 'JWT'
            ],
            [
                'nim' => $mahasiswa->nim,
            ],
                'secret'
        );

        $mahasiswa->token = $jwt; //
        $mahasiswa->save(); //

        return response()->json([
            'status' => 'Berhasil',
            'message' => 'Mahasiswa berhasil login',
            'token' => $mahasiswa->token
        ], 200);
    }

    private function base64url_encode(String $data): String // dikerjakan oleh Dzakiyyah Afifah Rahma
    {
        $base64 = base64_encode($data); // ubah json string menjadi base64
        $base64url = strtr($base64, '+/', '-_'); // ubah char '+' -> '-' dan '/' -> '_'

        return rtrim($base64url, '='); // menghilangkan '=' pada akhir string
    }

    private function sign(String $header, String $payload, String $secret): String
    {
        $signature = hash_hmac('sha256', "{$header}.{$payload}", $secret, true);
        $signature_base64url = $this->base64url_encode($signature);

        return $signature_base64url;
    }

    private function jwt(array $header, array $payload, String $secret, int $expiryMinutes = 60): String
    {
        $payload['exp'] = time() + $expiryMinutes * 60;

        $header_json = json_encode($header);
        $payload_json = json_encode($payload);

        $header_base64url = $this->base64url_encode($header_json);
        $payload_base64url = $this->base64url_encode($payload_json);
        $signature_base64url = $this->sign($header_base64url, $payload_base64url, $secret);
        $jwt = "{$header_base64url}.{$payload_base64url}.{$signature_base64url}";

    return $jwt;
    }
}


