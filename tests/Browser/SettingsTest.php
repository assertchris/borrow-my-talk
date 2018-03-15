<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SettingsTest extends DuskTestCase
{
    public function test_can_see_settings()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getUser())
                ->visit(route('users.settings'))
                ->assertValue('@name', $this->getUser()->name)
                ->assertValue('@email', $this->getUser()->email)
                ->assertValue('@handle', $this->getUser()->handle);
        });
    }

    private function getUser()
    {
        return User::where('email', 'cgpitt@gmail.com')->first();
    }

    public function test_detects_empty_fields()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getUser())
                ->visit(route('users.settings'))
                ->type('@name', '')
                ->type('@email', '')
                ->type('@handle', '')
                ->click('@submit')
                ->assertSee('name field is required')
                ->assertSee('email field is required')
                ->assertSee('handle field is required');
        });
    }

    public function test_detects_duplicate_emails()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getUser())
                ->visit(route('users.settings'))
                ->type('@email', 'jrmadsen67@gmail.com')
                ->click('@submit')
                ->assertSee('email has already been taken');
        });
    }

    public function test_detects_duplicate_handles()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->getUser())
                ->visit(route('users.settings'))
                ->type('@handle', 'codebyjeff')
                ->click('@submit')
                ->assertSee('handle has already been taken');
        });
    }

    public function test_can_save_settings()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->getUser();

            $browser
                ->loginAs($this->getUser())
                ->visit(route('users.settings'))
                ->type('@name', $user->name . '123')
                ->type('@email', $user->email . '123')
                ->type('@handle', $user->handle . '123')
                ->check('@from-under-represented-group')
                ->type('@from-under-represented-group-additional', 'some text here')
                ->click('@submit')
                ->pause(TEST_PAUSE_DURATION)
                ->visit(route('users.settings'))
                ->assertValue('@name', $user->name . '123')
                ->assertValue('@email', $user->email . '123')
                ->assertValue('@handle', $user->handle . '123')
                ->assertChecked('@from-under-represented-group')
                ->assertValue('@from-under-represented-group-additional', 'some text here');
        });
    }
}
