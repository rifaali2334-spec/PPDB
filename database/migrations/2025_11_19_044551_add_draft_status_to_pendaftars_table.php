<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        \DB::statement("ALTER TABLE pendaftars MODIFY COLUMN status ENUM('DRAFT','SUBMIT','ADM_PASS','ADM_REJECT','PAID') DEFAULT 'DRAFT'");
        \DB::statement("ALTER TABLE pendaftars MODIFY COLUMN user_verifikasi_adm VARCHAR(100) NULL");
        \DB::statement("ALTER TABLE pendaftars MODIFY COLUMN tgl_verifikasi_adm DATETIME NULL");
        \DB::statement("ALTER TABLE pendaftars MODIFY COLUMN user_verifikasi_payment VARCHAR(100) NULL");
        \DB::statement("ALTER TABLE pendaftars MODIFY COLUMN tgl_verifikasi_payment DATETIME NULL");
    }

    public function down(): void
    {
        \DB::statement("ALTER TABLE pendaftars MODIFY COLUMN status ENUM('SUBMIT','ADM_PASS','ADM_REJECT','PAID')");
    }
};
