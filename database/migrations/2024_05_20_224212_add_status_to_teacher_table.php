<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacher', function (Blueprint $table) {
            $table->boolean('status')->default(true);
        });
    }


    public function down()
    {
        Schema::table('teacher', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
