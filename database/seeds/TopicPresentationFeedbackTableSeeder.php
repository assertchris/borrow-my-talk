<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TopicPresentationFeedbackTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('topic_presentation_feedback')->insert([
            'link' => 'https://joind.in/event/nomad-php-us---october-2014/zombies-and-binary',
            'topic_presentation_id' => DB::table('topic_presentations')
                ->where('name', 'NomadPHP')
                ->where('year', 2014)
                ->where('month', 10)
                ->first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
