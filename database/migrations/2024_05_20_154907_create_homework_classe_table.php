<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkClasseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework_classe', function (Blueprint $table) {
            $table->unsignedBigInteger('homework_id');
            $table->unsignedBigInteger('classe_id');
            $table->foreign('homework_id')->references('id')->on('homework')->onDelete('cascade');
            $table->foreign('classe_id')->references('id')->on('classe')->onDelete('cascade');
            $table->primary(['homework_id', 'classe_id']);
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
        Schema::dropIfExists('homework_classe');
    }
}
