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
        Schema::create('feedback', function (Blueprint $table) {
            $table->uuid('id_feedback')->primary();
            $table->text('isi');
            $table->string('status');
            $table->date('tgl_feedback');
            $table->uuid('id_admin');
            $table->uuid('id_donatur');
            $table->string('reply')->nullable();

            $table->foreign('id_admin')->references('id_admin')->on('admin');
            $table->foreign('id_donatur')->references('id_donatur')->on('donatur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
