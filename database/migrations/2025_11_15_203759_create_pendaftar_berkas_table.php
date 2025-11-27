<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftar_berkas', function (Blueprint $table) {
            $table->id();
            $table->integer('pendaftar_id');
            $table->enum('jenis',['IJAZAH','RAPORT','KIP','KKS','AKTA','KK','LAINNYA']);
            $table->string('nama_file',255);
            $table->string('url',255);
            $table->integer('ukuran_kb');
            $table->integer('valid');
            $table->string('catatan',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar_berkas');
    }
};
