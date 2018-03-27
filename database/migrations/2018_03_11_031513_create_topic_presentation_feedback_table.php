<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicPresentationFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('topic_presentation_feedback', function (Blueprint $table) {
            $table->increments('id');

            // could be a link to joind.in feedback page or tweet of presentation
            $table->string('link');

            $table->unsignedInteger('topic_presentation_id')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('topic_presentation_feedback');
    }
}
