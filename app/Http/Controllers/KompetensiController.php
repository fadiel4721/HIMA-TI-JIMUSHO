<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KompetensiController extends Controller
{
    public function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apilive.minori.co.id/api_jimusho/takumi/v1/kompetensi_bahasa/',
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

        $mahasiswaData = []; 

        if ($data['isSuccess']) {
            foreach ($data['data'] as $kompetensi) {
                foreach ($kompetensi['mahasiswa'] as $mahasiswa) {
                    // Ambil prodi yang sesuai berdasarkan index (asumsi index 0 untuk setiap kompetensi)
                    $prodi = $kompetensi['prodi'][0] ?? null; // Mengambil prodi pertama, sesuaikan jika ada lebih dari satu prodi

                    $mahasiswaData[] = [
                        'nama' => $mahasiswa['nama'] ?? 'Tidak Diketahui',
                        'nim' => $mahasiswa['nim'] ?? 'Tidak Diketahui',
                        'prodi' => $prodi['prodi'] ?? 'Tidak Diketahui',
                        'level' => $kompetensi['level'] ?? 'Tidak Diketahui',
                        'skor' => $kompetensi['skor'] ?? 'Tidak Diketahui',
                        'tingkat' => $prodi['tingkat'] ?? 'Tidak Diketahui',
                        'type_bahasa' => $kompetensi['type_bahasa'] ?? 'Tidak Diketahui',
                        'jenis' => $kompetensi['jenis'] ?? 'Tidak Diketahui',
                        'tgl_sertifikat' => $kompetensi['tgl_sertifikat'] ?? 'Tidak Diketahui',
                        'file_sertifikat' => $kompetensi['file_sertifikat'] ?? 'Tidak Diketahui',
                    ];
                }
            }
        }

        return view('pages.kompetensi', compact('mahasiswaData')); // Mengirim data ke view
    }

    public function create()
    {
        
        
    }
    


    public function store(Request $request)
    {
        // 
    }
}
