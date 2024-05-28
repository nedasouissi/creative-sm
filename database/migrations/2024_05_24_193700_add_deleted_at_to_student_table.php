<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToStudentTable extends Migration
{
    public function up()
    {
        Schema::table('student', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('student', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
