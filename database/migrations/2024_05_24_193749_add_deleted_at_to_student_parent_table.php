<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToStudentParentTable extends Migration
{

    public function up()
    {
        Schema::table('student_parent', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('student_parent', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
