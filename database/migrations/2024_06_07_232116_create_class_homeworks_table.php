<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassHomeworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('class_homeworks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            // $table->unsignedBigInteger('user_id'); // Assuming this is the teacher's ID
            $table->unsignedBigInteger('homework_id');
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Assuming teachers are users
            $table->foreign('homework_id')->references('id')->on('homeworks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_homeworks');
    }
}
