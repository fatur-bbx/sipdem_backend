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
        Schema::create('donasi', function (Blueprint $table) {
            $table->uuid('id_donasi')->primary();
            $table->date('tgl_donasi');
            $table->string('nama_rekening');
            $table->uuid('id_donatur');
            $table->uuid('id_admin');
            $table->integer('jumlah_donasi');
            $table->string('status_donasi');
            $table->string('verifikasi');

            $table->foreign('id_donatur')->references('id_donatur')->on('donatur');
            $table->foreign('id_admin')->references('id_admin')->on('admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasi');
    }
};
