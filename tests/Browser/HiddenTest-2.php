<?php

namespace Tests\Browser;

use App\Topic;
use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HiddenTest extends DuskTestCase
{
    public function test_cannot_see_hidden_post_not_belonging_to_me()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit(route('topics.show', $this->getTopic()))
                ->assertSee('could not be found');
        });
    }

    private function getUser()
    {
        return User::where('email', 'cgpitt@gmail.com')->first();
    }

    private function getTopic()
    {
        return Topic::where('name', 'Plagiarised Topic')->withoutGlobalScope('filtered')->first();
    }

    public function test_cannot_see_hidden_post_in_search()
    {
        // let's check the first 3 search pages...
        $this->browse(function (Browser $browser) {
            $browser
                ->visit(route('topics.search'))
                ->assertNotSee($this->getTopic()->name)
                ->visit(route('topics.search') . '?page=1')
                ->assertNotSee($this->getTopic()->name)
                ->visit(route('topics.search') . '?page=2')
                ->assertNotSee($this->getTopic()->name)
                ->visit(route('topics.search') . '?page=3')
                ->assertNotSee($this->getTopic()->name);
        });
    }
}
