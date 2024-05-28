<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentParentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_parent', function (Blueprint $table) {
            $table->id();
            $table->string('father_name')->nullable();
            $table->string('father_last_name')->nullable();
            $table->integer('father_phone')->nullable();
            $table->string('parent_email')->nullable();
            $table->string('father_job')->nullable();
            $table->string('password')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_last_name')->nullable();
            $table->integer('mother_phone')->nullable();
            $table->string('mother_job')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('student_parent');
    }
}
