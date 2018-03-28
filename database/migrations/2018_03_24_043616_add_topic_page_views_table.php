<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTopicPageViewsTable extends Migration
{
    public function up()
    {
        Schema::create('topic_page_views', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country');
            $table->string('browser');
            $table->unsignedInteger('topic_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('topic_page_views');
    }
}
