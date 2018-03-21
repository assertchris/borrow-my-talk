<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTopicLinksTable extends Migration
{
    public function up()
    {
        Schema::create('topic_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('link');
            $table->integer('topic_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('topic_links');
    }
}
