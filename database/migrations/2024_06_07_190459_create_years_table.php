<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('years', function (Blueprint $table) {
            $table->id();
            $table->string('designation')->nullable();
            $table->string('nb_student')->nullable();
            $table->string('nb_parents')->nullable();
            $table->string('nb_teacher')->nullable();
            $table->string('nb_courses')->nullable();
            $table->string('nb_partners')->nullable();
            $table->string('nb_classes')->nullable();
            $table->string('nb_subjects')->nullable();
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
        Schema::dropIfExists('years');
    }
}
