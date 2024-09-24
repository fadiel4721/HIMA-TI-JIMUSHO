<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Inisialisasi cURL untuk mengakses API
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://apilive.minori.co.id/api_jimusho/takumi/v1/kompetensi_keahlian/',
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

        $mahasiswaData = []; // Array untuk menyimpan data mahasiswa

        // Jika response API sukses
        if ($data && isset($data['isSuccess']) && $data['isSuccess']) {
            foreach ($data['data'] as $kompetensi) {
                foreach ($kompetensi['mahasiswa'] as $mahasiswa) {
                    $mahasiswaData[] = [
                        'nama' => $mahasiswa['nama'] ?? 'Tidak Diketahui',
                        'nim' => $mahasiswa['nim'] ?? 'Tidak Diketahui',
                        'prodi' => $kompetensi['prodi'][0]['prodi'] ?? 'Tidak Diketahui',
                        'tingkat' => $kompetensi['prodi'][0]['tingkat'] ?? 'Tidak Diketahui',
                        'semester' => $kompetensi['prodi'][0]['semester'] ?? 'Tidak Diketahui',
                        'lingkup' => $kompetensi['lingkup'] ?? 'Tidak Diketahui',
                        'keahlian' => $kompetensi['keahlian'] ?? 'Tidak Diketahui',
                        'skor' => $kompetensi['skor'] ?? 'Tidak Diketahui',
                        'tgl_sertifikat' => $kompetensi['tgl_sertifikat'] ?? 'Tidak Diketahui',
                        'expire_sertifikat' => $kompetensi['expire_sertifikat'] ?? 'Tidak Diketahui',
                        'file_sertifikat' => $kompetensi['file_sertifikat'] ?? null,
                        'type_bahasa' => $kompetensi['type_bahasa'] ?? 'Tidak Diketahui',
                        'jenis' => $kompetensi['jenis'] ?? 'Tidak Diketahui',
                    ];
                }
            }
        } else {
            // Tambahkan pesan jika data tidak ditemukan atau API gagal
            $mahasiswaData[] = [
                'nama' => 'Tidak Ada Data',
                'nim' => '-',
                'prodi' => '-',
                'tingkat' => '-',
                'semester' => '-',
                'lingkup' => '-',
                'keahlian' => '-',
                'skor' => '-',
                'tgl_sertifikat' => '-',
                'expire_sertifikat' => '-',
                'file_sertifikat' => null,
            ];
        }

        return view('pages.keahlian', compact('mahasiswaData')); // Kirim data ke view
    }
}
