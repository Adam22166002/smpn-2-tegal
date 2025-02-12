<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBkComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bk_complaints', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('class_id')->constrained('kelas')->onDelete('cascade');
            $table->enum('problem_type', ['bullying', 'academic', 'family', 'career', 'other']);
            $table->text('description');
            $table->enum('urgency', ['low', 'medium', 'high'])->default('low');
            $table->enum('status', ['pending', 'in_progress', 'resolved'])->default('pending');
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
        Schema::dropIfExists('bk_complaints');
    }
}
