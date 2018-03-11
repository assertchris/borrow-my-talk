<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TopicPresentationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('topic_presentations')->insert([
            'medium' => 'meet-up',
            'name' => 'NomadPHP',
            'year' => 2014,
            'month' => 10,
            'was_enjoyed' => true,
            'topic_id' => DB::table('topics')->where('name', 'Zombies and Binary')->first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
