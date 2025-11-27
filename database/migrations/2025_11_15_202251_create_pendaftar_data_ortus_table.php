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
        Schema::create('pendaftar_data_ortus', function (Blueprint $table) {
            $table->id('pendaftar_id');
            $table->string('nama_ayah',120);
            $table->string('pekerjaan_ayah',100);
            $table->string('hp_ayah',20);
            $table->string('nama_ibu',120);
            $table->string('pekerjaan_ibu',100);
            $table->string('hp_ibu',20);
            $table->string('wali_nama',120);
            $table->string('wali_hp',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar_data_ortus');
    }
};
