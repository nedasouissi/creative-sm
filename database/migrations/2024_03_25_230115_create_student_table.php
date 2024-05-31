<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('student_name')->nullable();
            $table->string('student_last_name')->nullable();
            $table->string('student_grade')->nullable();
            $table->integer('student_phone')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('avatar')->nullable();
            $table->unsignedBigInteger('student_parent_id');
            $table->softDeletes();
            $table->foreign('student_parent_id')->references('id')->on('student_parent');
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
        Schema::dropIfExists('student');
    }
}
