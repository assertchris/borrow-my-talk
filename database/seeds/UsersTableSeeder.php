<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Christopher Pitt',
            'handle' => 'assertchris',
            'email' => 'cgpitt@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Jeff Madsen',
            'handle' => 'codebyjeff',
            'email' => 'jrmadsen67@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
