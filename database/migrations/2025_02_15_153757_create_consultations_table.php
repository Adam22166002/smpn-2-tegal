<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->enum('category', ['akademik', 'sosial', 'pribadi', 'karier']); // Menentukan opsi kategori
            $table->text('message');
            // $table->foreignId('class_id')->nullable()->constrained('classes')->onDelete('set null'); // Jika ada kelas
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
