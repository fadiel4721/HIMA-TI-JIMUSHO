<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    public function create(Request $request)
    {
        $response = Http::post('http://apilive.minori.co.id/api_jimusho/takumi/v1/mahasiswa/create.php', [
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'),
            'signature' => $request->input('signature'),
        ]);

        if ($response->successful()) {
            return response()->json([
                'message' => 'Data berhasil dikirim!',
                'data' => $response->json(),
            ]);
        } else {
            return response()->json([
                'message' => 'Terjadi kesalahan: ' . $response->status(),
            ], $response->status());
        }
    }
}
