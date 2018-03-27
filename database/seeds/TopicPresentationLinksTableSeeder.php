<?php

use App\TopicPresentation;
use Illuminate\Database\Seeder;

class TopicPresentationLinksTableSeeder extends Seeder
{
    public function run()
    {
        $presentation = TopicPresentation::where('name', 'NomadPHP')
            ->where('year', 2014)
            ->where('month', 10)
            ->first();

        $presentation->links()->create([
            'type' => 'feedback',
            'link' => 'https://joind.in/event/nomad-php-us---october-2014/zombies-and-binary',
        ]);
    }
}
