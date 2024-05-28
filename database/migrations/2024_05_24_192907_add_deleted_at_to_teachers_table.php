<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToTeachersTable extends Migration
{

    public function up()
    {
        Schema::table('teacher', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('teacher', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
