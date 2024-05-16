<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->date('teacher_birthdate');
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subject');
            $table->unsignedBigInteger('classe_id');
            $table->foreign('classe_id')->references('id')->on('classe');
            $table->string('teacher_phone');
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
        Schema::dropIfExists('teacher');
    }
}
