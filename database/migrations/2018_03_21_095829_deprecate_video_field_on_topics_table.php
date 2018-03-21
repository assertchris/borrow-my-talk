<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeprecateVideoFieldOnTopicsTable extends Migration
{
    public function up()
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->renameColumn('video', 'video_deprecated');
        });
    }

    public function down()
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->renameColumn('video_deprecated', 'video');
        });
    }
}
