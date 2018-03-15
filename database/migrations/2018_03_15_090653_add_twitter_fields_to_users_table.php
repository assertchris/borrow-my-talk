<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTwitterFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('twitter_id')->nullable();
            $table->string('twitter_token')->nullable();
            $table->string('twitter_token_secret')->nullable();
            $table->dateTime('twitter_auth_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('twitter_id');
            $table->dropColumn('twitter_token');
            $table->dropColumn('twitter_token_secret');
            $table->dropColumn('twitter_auth_at');
        });
    }
}
