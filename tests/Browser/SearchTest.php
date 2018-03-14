<?php

namespace Tests\Browser;

use App\Topic;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SearchTest extends DuskTestCase
{
    public function test_pagination()
    {
        $this->browse(function (Browser $browser) {
            $topics = $this->getTopics();

            $browser
                ->visit('/search')
                ->assertSee($topics[1]->name)
                ->assertDontSee($topics[0]->name)
                ->clickLink('2')
                ->assertSee($topics[0]->name)
                ->assertDontSee($topics[1]->name);
        });
    }

    private function getTopics()
    {
        return [
            Topic::oldest()->first(),
            Topic::latest()->first(),
        ];
    }

    public function test_algolia_search()
    {
        $this->markTestIncomplete('Unsure how to store Algolia details well');
    }
}
