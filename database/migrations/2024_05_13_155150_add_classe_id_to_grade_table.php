<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClasseIdToGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grade', function (Blueprint $table) {
            $table->unsignedBigInteger('classe_id');
            $table->foreign('classe_id')->references('id')->on('classe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grade', function (Blueprint $table) {
            $table->dropForeign(['classe_id']);
            $table->dropColumn('classe_id');
        });
    }

}
