<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori', ['Tugas', 'Ulangan Harian', 'UTS', 'UAS']);
            $table->decimal('nilai', $precision = 10, $scale = 0);
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('mata_pelajaran_id');
            $table->unsignedBigInteger('murid_id');
            $table->unsignedBigInteger('guru_id');
            $table->foreign('mata_pelajaran_id')->references('id')->on('mata_pelajaran')->onDelete('cascade');
            $table->foreign('murid_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('guru_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
}
