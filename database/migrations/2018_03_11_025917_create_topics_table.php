<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            // a short introduction to the topic, as would be found on a conference website
            $table->text('abstract');

            // more details to motivate the selection of this topic, such as presenter qualifications and implementation details
            $table->text('additional')->nullable();

            // a URL for slides used in the presentation of this topic
            $table->string('slides')->nullable();

            // a URL for a video recording of a previous presentation of this topic
            $table->string('video')->nullable();

            // whether or not the creator is willing to mentor presentors to present this topic
            $table->boolean('includes_mentoring')->default(false);

            // whether or not the creaator is willing to be contacted about presenting this topic again
            $table->boolean('willing_to_present')->default(false);

            $table->integer('user_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
