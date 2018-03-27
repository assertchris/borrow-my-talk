<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $now = now();
        $user = User::where('email', 'cgpitt@gmail.com')->first();

        $titles = [
            'Zombies and Binary',
            'Making Games With ReactJS',
            'Building Robots With PHP',
            'Cooperative Multitasking With Generators',
            'Monads in PHP',
            'Transforming PHP',
            'Making Async Applications',
            'Laravel: Idea to Product',
        ];

        foreach ($titles as $title) {
            $user->topics()->create([
                'name' => $title,
                'abstract' => $faker->paragraphs($number = 3, $asText = true),
                'additional' => $faker->paragraphs($number = 1, $asText = true),
                'willing_to_present' => $faker->boolean(),
                'includes_mentoring' => $faker->boolean(),
                'created_at' => $now->addMinute(),
                'updated_at' => $now,
            ]);
        }

        $user->topics()->create([
            'name' => 'Plagiarised Topic',
            'abstract' => $faker->paragraphs($number = 3, $asText = true),
            'additional' => $faker->paragraphs($number = 1, $asText = true),
            'willing_to_present' => $faker->boolean(),
            'includes_mentoring' => $faker->boolean(),
            'created_at' => $now->addMinute(),
            'updated_at' => $now,
            'hidden_at' => $now,
        ]);
    }
}
