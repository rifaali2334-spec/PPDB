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
        Schema::create('pendaftar_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->integer('pendaftar_id');
            $table->string('bank', 50);
            $table->string('bukti_pembayaran', 255);
            $table->datetime('tanggal_upload');
            $table->enum('status', ['PENDING', 'VERIFIED', 'REJECTED'])->default('PENDING');
            $table->string('catatan', 255)->nullable();
            $table->string('verifikator', 100)->nullable();
            $table->datetime('tanggal_verifikasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar_pembayarans');
    }
};
