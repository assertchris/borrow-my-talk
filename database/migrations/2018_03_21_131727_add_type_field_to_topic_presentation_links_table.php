<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeFieldToTopicPresentationLinksTable extends Migration
{
    public function up()
    {
        Schema::table('topic_presentation_links', function (Blueprint $table) {
            $table->string('type')->nullable();
        });
    }

    public function down()
    {
        Schema::table('topic_presentation_links', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
