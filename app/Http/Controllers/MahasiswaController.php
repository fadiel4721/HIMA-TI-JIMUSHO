<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    public function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apilive.minori.co.id/api_jimusho/takumi/v1/mahasiswa/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'signature=eba8e288da46b4b9e7866bbafe8f1118017bfea983d5a180bec472ab0fa79cc8',
            CURLOPT_HTTPHEADER => array(
                'Authorization: f1d3b0ff4987f36f925e6b917',
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true); // Menguraikan JSON

        if ($data['isSuccess']) {
            $mahasiswas = $data['data']; // Mendapatkan data mahasiswa
        } else {
            $mahasiswas = []; // Jika gagal, siapkan array kosong
        }

        return view('pages.mahasiswa', compact('mahasiswas')); // Mengirim data ke view
    }



    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apilive.minori.co.id/api_jimusho/takumi/v1/mahasiswa/create.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query([
                'signature' => 'eba8e288da46b4b9e7866bbafe8f1118017bfea983d5a180bec472ab0fa79cc8',
                'nim' => $request->nim,
                'nama' => $request->nama,
                'status' => $request->status,
            ]),
            CURLOPT_HTTPHEADER => array(
                'Authorization: f1d3b0ff4987f36f925e6b917',
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        // Anda bisa mengarahkan pengguna setelah menyimpan data, misalnya:
        return redirect()->route('mahasiswa')->with('success', 'Data mahasiswa berhasil disimpan.');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nim' => 'required|numeric',
            'nama' => 'required|string|max:255',
            'status' => 'required|string',
        ]);

        // Update data mahasiswa
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://apilive.minori.co.id/api_jimusho/takumi/v1/mahasiswa/update.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query([
                'signature' => 'eba8e288da46b4b9e7866bbafe8f1118017bfea983d5a180bec472ab0fa79cc8',
                'id' => $id,
                'nim' => $request->nim,
                'nama' => $request->nama,
                'status' => $request->status,
            ]),
            CURLOPT_HTTPHEADER => [
                'Authorization: f1d3b0ff4987f36f925e6b917',
                'Content-Type: application/x-www-form-urlencoded'
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        // Periksa jika ada respons dari API
        $responseData = json_decode($response);

        if ($responseData && $responseData->isSuccess) {
            return redirect()->route('mahasiswa')->with('success', 'Data mahasiswa berhasil diupdate');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data mahasiswa');
        }
    }

    public function dashboard()
    {
        // Mengambil data mahasiswa dari API
        $response = Http::get('https://apilive.minori.co.id/api_jimusho/takumi/v1/mahasiswa/');

        if ($response->successful()) {
            $mahasiswas = $response->json(); // Mengambil data dalam format JSON
            $totalMahasiswa = count($mahasiswas); // Menghitung total mahasiswa

            // Menghitung mahasiswa aktif dan non-aktif
            $dataMahasiswaAktif = collect($mahasiswas)->where('status', 'Aktif')->count();
            $dataMahasiswaNonAktif = collect($mahasiswas)->where('status', 'Non Aktif')->count();

            // Mengirim data ke view
            return view('pages.dashboard', [
                'totalMahasiswa' => $totalMahasiswa,
                'dataMahasiswaAktif' => $dataMahasiswaAktif,
                'dataMahasiswaNonAktif' => $dataMahasiswaNonAktif
            ]);
        } else {
            // Menangani jika API gagal
            return view('pages.dashboard', [
                'totalMahasiswa' => 0,
                'dataMahasiswaAktif' => 0,
                'dataMahasiswaNonAktif' => 0
            ]);
        }
    }

}
