<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTopicRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('topic_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('type');
            $table->string('when')->nullable();
            $table->text('additional')->nullable();
            $table->boolean('wants_mentoring')->default(false);
            $table->unsignedInteger('topic_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('topic_requests');
    }
}
