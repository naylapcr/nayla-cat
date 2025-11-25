<?php
// database/migrations/xxxx_xx_xx_add_pelanggan_id_to_multiuploads_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('multipleuploads', function (Blueprint $table) {
            // Tambahkan kolom pelanggan_id
            $table->unsignedBigInteger('pelanggan_id')->after('id');

            // Opsional: Foreign Key Constraint (asumsi tabel pelanggan sudah ada)
            // $table->foreign('pelanggan_id')->references('pelanggan_id')->on('pelanggan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('multipleuploads', function (Blueprint $table) {
            // $table->dropForeign(['pelanggan_id']); // Hapus constraint jika dibuat
            $table->dropColumn('pelanggan_id');
        });
    }
};
