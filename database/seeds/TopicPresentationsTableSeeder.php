<?php

use App\Topic;
use Illuminate\Database\Seeder;

class TopicPresentationsTableSeeder extends Seeder
{
    public function run()
    {
        $topic = Topic::where('name', 'Zombies and Binary')->first();

        $topic->presentations()->create([
            'medium' => 'meet-up',
            'name' => 'NomadPHP',
            'year' => 2014,
            'month' => 10,
            'was_enjoyed' => true,
        ]);
    }
}
