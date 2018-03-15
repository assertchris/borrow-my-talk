<?php

namespace Tests\Browser;

use App\Topic;
use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HiddenTest extends DuskTestCase
{
    public function test_can_see_hidden_post_belonging_to_me()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getUser())
                ->visit(route('topics.index'))
                ->assertSee($this->getTopic()->name);
        });
    }

    private function getUser()
    {
        return User::where('email', 'cgpitt@gmail.com')
            ->first();
    }

    private function getTopic()
    {
        return Topic::where('name', 'Plagiarised Topic')
            ->withoutGlobalScope('filtered')
            ->first();
    }

    public function test_can_edit_hidden_topic()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getUser())
                ->visit(route('topics.edit', $this->getTopic()))
                ->assertValue('@name', $this->getTopic()->name)
                ->assertSee('This topic has been hidden.');
        });
    }
}
