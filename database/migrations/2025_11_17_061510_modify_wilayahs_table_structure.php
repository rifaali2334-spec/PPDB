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
        Schema::dropIfExists('wilayahs');
        Schema::create('wilayahs', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 20)->unique();
            $table->string('nama', 100);
            $table->enum('level', ['provinsi', 'kabupaten', 'kecamatan', 'kelurahan']);
            $table->string('parent_kode', 20)->nullable();
            $table->string('kode_pos', 10)->nullable();
            $table->timestamps();
            $table->index(['parent_kode', 'level']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayahs');
    }
};
