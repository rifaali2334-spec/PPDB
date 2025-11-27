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
        Schema::table('pendaftar_pembayarans', function (Blueprint $table) {
            $table->dropColumn(['bank', 'tanggal_upload', 'catatan', 'verifikator', 'tanggal_verifikasi']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftar_pembayarans', function (Blueprint $table) {
            $table->string('bank', 50);
            $table->datetime('tanggal_upload');
            $table->string('catatan', 255)->nullable();
            $table->string('verifikator', 100)->nullable();
            $table->datetime('tanggal_verifikasi')->nullable();
        });
    }
};
