<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBkAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bk_appointments', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['online', 'offline']);
            $table->string('name');
            $table->foreignId('class_id')->constrained('kelas')->onDelete('cascade');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->enum('consultation_topic', ['academic', 'career', 'personal', 'social', 'other']);
            $table->text('description')->nullable();
            $table->foreignId('counselor_id')->nullable()->constrained('users');
            $table->enum('platform', ['google_meet', 'zoom', 'whatsapp'])->nullable();
            $table->enum('status', ['pending', 'approved', 'completed', 'cancelled'])->default('pending');
            $table->string('meeting_link')->nullable();
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
        Schema::dropIfExists('bk_appointments');
    }
}
