<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('father_name');
            $table->string('father_last_name');
            $table->string('mother_name');
            $table->string('mother_last_name');
            $table->string('father_job');
            $table->string('father_phone');
            $table->string('mother_job');
            $table->string('mother_phone');
            $table->string('student_name');
            $table->string('student_last_name');
            $table->string('student_phone');
            $table->date('student_birthdate');
            $table->string('student_grade')->nullable();
            $table->string('student_avatar')->nullable();
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parents');
    }
}
