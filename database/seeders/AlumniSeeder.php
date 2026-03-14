<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumni;

class AlumniSeeder extends Seeder
{
    public function run()
    {
        // Memasukkan data uji coba pertama
        Alumni::create([
            'nama_asli' => 'Bagus Romadon',
            'variasi_nama' => 'Bagus R., B. Romadon',
            'program_studi' => 'Informatika',
            'tahun_lulus' => '2024',
            'domisili' => 'Malang',
            'status_pelacakan' => 'Belum Dilacak'
        ]);

        // Memasukkan data uji coba kedua
        Alumni::create([
            'nama_asli' => 'Fulan Hidayat',
            'variasi_nama' => 'Fulan H., F. Hidayat',
            'program_studi' => 'Informatika',
            'tahun_lulus' => '2023',
            'domisili' => 'Surabaya',
            'status_pelacakan' => 'Belum Dilacak'
        ]);
    }
}