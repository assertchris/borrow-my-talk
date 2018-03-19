<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicReportsTable extends Migration
{
    public function up()
    {
        Schema::create('topic_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reasons');
            $table->string('links')->nullable();
            $table->integer('topic_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('topic_reports');
    }
}
