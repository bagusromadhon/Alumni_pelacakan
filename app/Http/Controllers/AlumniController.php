<?php
namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        // Mengambil semua data alumni dari master pangkalan data
        $alumnis = Alumni::all(); 
        
        // Mengirim data ke halaman tampilan (View)
        return view('alumni.index', compact('alumnis'));
    }



    public function track($id)
    {
        $alumni = Alumni::findOrFail($id);

        // 1. Simulasi Mesin Ekstraksi & Layanan Pihak Ketiga mengambil data
        $skor = rand(60, 99); // Menghasilkan probabilitas kemiripan acak 60% - 99%
        $sumber = ['LinkedIn', 'Google Scholar', 'Portal Akademik'][rand(0, 2)];
        $jabatan = ['Software Engineer', 'Data Analyst', 'Dosen', 'IT Support'][rand(0, 3)];

        // 2. Fase Resolusi Entitas dan Skoring (Sesuai Pseudocode Anda)
        if ($skor >= 80) {
            // Skor tinggi, otomatis valid
            $alumni->status_pelacakan = 'Teridentifikasi';
        } else {
            // Skor nanggung, butuh cek admin
            $alumni->status_pelacakan = 'Perlu Verifikasi Manual'; 
        }
        $alumni->save();

        // 3. Fase Menyimpan Jejak Audit ke Tabel tracking_histories
        \App\Models\TrackingHistory::create([
            'alumni_id' => $alumni->id,
            'sumber_temuan' => $sumber,
            'jabatan' => $jabatan,
            'instansi' => 'Perusahaan / Universitas Terkait',
            'lokasi' => 'Indonesia',
            'skor_keyakinan' => $skor,
            'tautan_bukti' => 'https://pencarian-publik.com/profil/' . $alumni->id
        ]);

        return redirect()->back()->with('success', 'Ekstraksi selesai untuk ' . $alumni->nama_asli . '! Skor kemiripan: ' . $skor . '%');
    }


    public function show($id)
    {
        // Mengambil data alumni beserta riwayat pelacakannya
        $alumni = Alumni::with('trackingHistories')->findOrFail($id);
        
        return view('alumni.show', compact('alumni'));
    }
}