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
        Schema::create('tukik', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penetasan_id')->constrained('penetasan');
            $table->date('tanggal');
            $table->foreignId('penyu_id')->constrained('penyu');
            $table->enum('status', ['karantina', 'dilepaskan'])->default('karantina');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tukik');
    }
};
