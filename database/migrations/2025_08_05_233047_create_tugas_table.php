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
       Schema::create('tugas', function (Blueprint $table) {
    $table->id();
    $table->foreignId('kelas_id')->constrained()->onDelete('cascade');
    $table->string('judul');
    $table->text('deskripsi')->nullable();
    $table->timestamp('batas_pengumpulan')->nullable();
    $table->string('file')->nullable(); // file soal, referensi, dll
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas');
    }
};
