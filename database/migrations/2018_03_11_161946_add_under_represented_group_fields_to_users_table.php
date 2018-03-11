<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnderRepresentedGroupFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('from_under_represented_group')->nullable();
            $table->string('from_under_represented_group_additional')->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('from_under_represented_group');
            $table->dropColumn('from_under_represented_group_additional');
        });
    }
}
