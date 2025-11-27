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
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->datetime('tanggal_daftar');
            $table->string('no_pendaftaran',20);
            $table->integer('gelombang_id');
            $table->integer('jurusan_id');
            $table->enum('status',['DRAFT','SUBMIT','ADM_PASS','ADM_REJECT','PAID'])->default('DRAFT');
            $table->string('user_verifikasi_adm',100)->nullable();
            $table->datetime('tgl_verifikasi_adm')->nullable();
            $table->string('user_verifikasi_payment',100)->nullable();
            $table->datetime('tgl_verifikasi_payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
