<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
{
    Schema::create('alumnis', function (Blueprint $table) {
        $table->id();
        $table->string('nama_asli');
        $table->text('variasi_nama')->nullable(); // Menyimpan variasi seperti "M. Rizky"
        $table->string('program_studi')->nullable(); // Kata kunci afiliasi
        $table->string('tahun_lulus')->nullable(); // Kata kunci konteks
        $table->string('domisili')->nullable();
        $table->enum('status_pelacakan', [
            'Belum Dilacak', 
            'Teridentifikasi', 
            'Perlu Verifikasi Manual', 
            'Belum Ditemukan'
        ])->default('Belum Dilacak');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnis');
    }
};
