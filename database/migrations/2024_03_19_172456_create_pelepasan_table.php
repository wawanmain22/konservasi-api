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
        Schema::create('pelepasan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tukik_id')->constrained('tukik');
            $table->date('tanggal');
            $table->integer('tukik_dilepas');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelepasan');
    }
};
