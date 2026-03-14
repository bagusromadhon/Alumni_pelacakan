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
    Schema::create('tracking_histories', function (Blueprint $table) {
        $table->id();
        $table->foreignId('alumni_id')->constrained('alumnis')->onDelete('cascade');
        $table->string('sumber_temuan'); // Contoh: Google Scholar, LinkedIn
        $table->string('jabatan')->nullable();
        $table->string('instansi')->nullable();
        $table->string('lokasi')->nullable();
        $table->decimal('skor_keyakinan', 5, 2)->nullable(); // Menyimpan probabilitas (misal: 85.50)
        $table->text('tautan_bukti')->nullable();
        $table->timestamps(); // Otomatis mencatat cap waktu tanggal ditemukan
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracking_histories');
    }
};
