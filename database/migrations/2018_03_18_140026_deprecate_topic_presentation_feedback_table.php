<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class DeprecateTopicPresentationFeedbackTable extends Migration
{
    public function up()
    {
        Schema::rename('topic_presentation_feedback', 'topic_presentation_feedback_deprecated');
    }

    public function down()
    {
        Schema::rename('topic_presentation_feedback_deprecated', 'topic_presentation_feedback');
    }
}
