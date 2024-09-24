<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apilive.minori.co.id/api_jimusho/takumi/v1/prodi/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'signature=eba8e288da46b4b9e7866bbafe8f1118017bfea983d5a180bec472ab0fa79cc8',
            CURLOPT_HTTPHEADER => array(
                'Authorization: f1d3b0ff4987f36f925e6b917'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true); // Menguraikan JSON

        if ($data['isSuccess']) {
            $prodis = $data['data']; // Mendapatkan data prodi
        } else {
            $prodis = []; // Jika gagal, siapkan array kosong
        }

        return view('pages.prodi', compact('prodis')); // Mengirim data ke view
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $curl = curl_init();

        // Ambil data dari request
        $data = [
            'signature' => 'eba8e288da46b4b9e7866bbafe8f1118017bfea983d5a180bec472ab0fa79cc8',
            'prodi' => $request->input('nama'),
            'tingkat' => $request->input('tingkat'),
            'semester' => $request->input('semester'),
            'tahun_akademik' => '2023/2024' // Sesuaikan tahun akademik jika diperlukan
        ];

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apilive.minori.co.id/api_jimusho/takumi/v1/prodi/create.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($data), // Mengirim data sebagai query string
            CURLOPT_HTTPHEADER => array(
                'Authorization: f1d3b0ff4987f36f925e6b917',
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        // Tambahkan logika untuk menangani respon dari API
        return redirect()->route('prodi')->with('success', 'Program Studi berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prodi = Prodi::findOrFail($id);
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $curl = curl_init();

        // Ambil data dari request
        $data = [
            'signature' => 'eba8e288da46b4b9e7866bbafe8f1118017bfea983d5a180bec472ab0fa79cc8',
            'id' => $id,
            'prodi' => $request->input('nama'),
            'tingkat' => $request->input('tingkat'),
            'semester' => $request->input('semester'),
            'tahun_akademik' => '2024/2025' // Sesuaikan jika perlu
        ];

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apilive.minori.co.id/api_jimusho/takumi/v1/prodi/update.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($data), // Menggunakan http_build_query untuk mengirim data
            CURLOPT_HTTPHEADER => array(
                'Authorization: f1d3b0ff4987f36f925e6b917',
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        // Tambahkan logika untuk menangani respon dari API
        return redirect()->route('prodi')->with('success', 'Program Studi berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
