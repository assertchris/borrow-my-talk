<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicPresentationsTable extends Migration
{
    public function up()
    {
        Schema::create('topic_presentations', function (Blueprint $table) {
            $table->increments('id');

            // the medium on which this topic was presented, such as at a conference or on a blog
            $table->string('medium');

            // the name of the conference or blog etc. where this topic was presented
            $table->string('name');

            // (optional) the year this presentation happened
            $table->integer('year')->nullable();

            // (optional) the month this presentation happened
            $table->integer('month')->nullable();

            // (optional) any additional notes about this particular presentation, which may shed light on the feedback
            // could be something like; "the projector was poor as was the lighting, so code was difficult to see on the slides"
            $table->text('additional')->nullable();

            // whether or not the presentor enjoyed this presentation
            // it's entirely subjective, and could be for any number of reasons; but it's helpful to display the overall "feeling" of the topic, for all presentations
            $table->boolean('was_enjoyed')->default(false);

            // this affects feedback and nerves, might not be apparent from year/month alone
            $table->boolean('was_first_time_presenting_topic')->default(false);

            $table->integer('topic_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('topic_presentations');
    }
}
