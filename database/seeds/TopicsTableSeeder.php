<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('topics')->insert([
            'name' => 'Zombies and Binary',
            'abstract' => 'Minecraft, for many, is just a fun game. It\'s an open world where you break build and combine resources to survive. But there\'s a deeper level to Minecraft...

It\'s possible to construct basic circuitry, using some of those resources. Logic gates, timers and clocks are the building blocks of modern technology, and they\'re possible in Minecraft!

I want to show you how to build them, and the relationship they have to programming. I want you to see how easy it is to teach electronics and programming to children and non-technical folks.  I want you to be able to identify similar parallels in systems you use every day.',
            'additional' => 'I present this in a really unique way, walking through slides within the game. I\'ve also written a series of posts on the topic at <https://medium.com/zombies-binary>.',
            'video' => 'https://www.youtube.com/watch?v=APJRBZUxADQ',
            'willing_to_present' => true,
            'user_id' => DB::table('users')->where('email', 'cgpitt@gmail.com')->first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
