<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeprecateSlidesFieldOnTopicsTable extends Migration
{
    public function up()
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->renameColumn('slides', 'slides_deprecated');
        });
    }

    public function down()
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->renameColumn('slides_deprecated', 'slides');
        });
    }
}
