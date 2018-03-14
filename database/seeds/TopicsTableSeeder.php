<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        $user = DB::table('users')->where('email', 'cgpitt@gmail.com')->first();

        DB::table('topics')->insert([
            'name' => 'Zombies and Binary',
            'abstract' => 'Minecraft, for many, is just a fun game. It\'s an open world where you break build and combine resources to survive. But there\'s a deeper level to Minecraft...

It\'s possible to construct basic circuitry, using some of those resources. Logic gates, timers and clocks are the building blocks of modern technology, and they\'re possible in Minecraft!

I want to show you how to build them, and the relationship they have to programming. I want you to see how easy it is to teach electronics and programming to children and non-technical folks.  I want you to be able to identify similar parallels in systems you use every day.',
            'additional' => 'I present this in a really unique way, walking through slides within the game. I\'ve also written a series of posts on the topic at <https://medium.com/zombies-binary>.',
            'video' => 'https://www.youtube.com/watch?v=APJRBZUxADQ',
            'willing_to_present' => true,
            'user_id' => $user->id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('topics')->insert([
            'name' => 'Making Games With ReactJS',
            'abstract' => 'ReactJS has fundamentally changed how we think about building interfaces. Using the same tools, we can bring this thinking to SVG, WebGL, and beyond.  Makes you wonder – could we build games using ReactJS?

In this talk, we\'ll build a platform game, using ReactJS.',
            'willing_to_present' => true,
            'user_id' => $user->id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('topics')->insert([
            'name' => 'Building Robots With PHP',
            'abstract' => 'I bet you\'re the kind of person who\'s too busy working to build robots, with PHP. Well, you\'re missing out!

Over the last few years, I\'ve built all sorts of useful robots (Internet of Things machines); to connect to virtual environments, automate my surroundings, or generally make my life easier.

And I found all of these could be built using little more than the familiar PHP code I was using in my 9-to-5. Join me as I show you some of the cool things you can do, with an Arduino, some useful PHP libraries, and a lot of imagination. ',
            'willing_to_present' => true,
            'user_id' => $user->id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('topics')->insert([
            'name' => 'Cooperative Multitasking With Generators',
            'abstract' => 'Part of writing asynchronous code in PHP is using extensions and services to offload processing. Another part is using core mechanics to structure traditionally synchronous code in new ways. That\'s where this talk comes in.

Generators were added in PHP 5.5. These were originally meant to add syntactic sugar on top of iterable structures, but some folks have learned how to use them to simulate interruptible functions.

We take a look at how generators can be used for iteration, and how iteration and interruptibility are two sides to the same coin. There\'s hand-on code, as I show you how to build a multitasking system in 100 lines of code. Finally we look at a few popular projects that use this mechanic to facilitate common programming tasks using interruptible functions.',
            'willing_to_present' => true,
            'user_id' => $user->id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('topics')->insert([
            'name' => 'Monads in PHP',
            'abstract' => 'Many developers get lost in the hype of object oriented design. They miss out on how expressive and succinct their code could be if they tried functional programming.

Take Monads, for instance. Many developers haven\'t even heard the name, much less are able to describe what Monads are and how they can be useful in every-day code.

In this talk, we\'ll gain a clear and simple understanding of what Monads are, and how they can help us to refactor our code to be clear and concise.',
            'willing_to_present' => true,
            'user_id' => $user->id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('topics')->insert([
            'name' => 'Transforming PHP',
            'abstract' => 'If you use other languages, you\'ve probably found features that you wish PHP had. Perhaps you miss that bit of C# class accessor syntax. Or perhaps you\'d really like to use JS arrow functions...

You can have those things, and you don\'t even have to write C to do it.

I’m going to introduce you to a library that will allow you to use preprocessor macros, to turn your desired bit of syntax into valid PHP syntax. Then I’m going to show you a few libraries that use those macros to bring fresh and interesting new syntax to everyday PHP applications.',
            'willing_to_present' => true,
            'user_id' => $user->id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('topics')->insert([
            'name' => 'Making Async Applications',
            'abstract' => 'You\'ve probably been to a couple talks, about how to do "asynchronous things" with PHP. What the experts don\'t tell you is that the hard part starts when you need to build an application. 

Sure, there are tools for starting an HTTP server or connecting to a web socket. But what about when you need to write to a database or send an email. You go searching for good tutorials, and all you get is API documentation; about how to use each component in isolation.

Say goodbye to that frustration. In this workshop, I\'m going to show you how to build an entirely asynchronous, high-concurrency PHP application. We\'ll bring those isolated components together, to build a real application.

Some topics we\'ll cover:

* HTTP servers and routing
* Watching for file changes, and restarting the server daemon
* Understanding generators and promises
* Adding new and useful syntax (to the PHP language) for async applications
* Testing asynchronous code
* Working with databases
* Validating request parameters and formatting responses
* Using front-end frameworks, like ReactJS
* Making requests to the server (including CORS)
* Connecting through web sockets
* Making async HTTP requests, from your server to third-party services
* Forking and multithreading
* Reading and writing files
* Deploying and hosting, with TLS',
            'willing_to_present' => true,
            'user_id' => $user->id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('topics')->insert([
            'name' => 'Laravel: Idea to Product',
            'abstract' => 'Got an idea for a product or service? Laravel is the perfect framework to get you up and running, fast! In this workshop, we\'ll take a simple product idea and build it into a live web app. We\'ll learn about how to set build PHP application logic, how to bolt on a Javascript front-end, how to deploy with Forge, and even how to manage domains and SSL certificates. By the end, you\'ll know everything you need to make your idea a reality.',
            'willing_to_present' => true,
            'user_id' => $user->id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('topics')->insert([
            'name' => 'Plagiarised Topic',
            'abstract' => 'This content doesn\'t really matter...',
            'user_id' => $user->id,
            'created_at' => $now,
            'updated_at' => $now,
            'hidden_at' => $now,
        ]);
    }
}
