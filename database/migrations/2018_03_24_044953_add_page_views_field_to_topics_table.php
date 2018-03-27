<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPageViewsFieldToTopicsTable extends Migration
{
    public function up()
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->integer('page_views')->default(0);
        });
    }

    public function down()
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->dropColumn('page_views');
        });
    }
}
