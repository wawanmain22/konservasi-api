<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penetasan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persemaian_id')->constrained('persemaian');
            $table->foreignId('penyu_id')->constrained('penyu');
            $table->integer('jmlh_telur_menetas');
            $table->integer('jmlh_telur_tdk_menetas');
            $table->integer('jmlh_tukik_hidup');
            $table->integer('jmlh_tukik_mati');
            $table->date('lama_inkubasi');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penetasan');
    }
};
