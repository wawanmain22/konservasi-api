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
        Schema::create('persemaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaratan_id')->constrained('pendaratan');
            $table->foreignId('penyu_id')->constrained('penyu');
            $table->date('tanggal');
            $table->integer('no_sarang')->unique();
            $table->integer('jumlah_telur');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persemaian');
    }
};
