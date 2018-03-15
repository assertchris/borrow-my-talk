<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class RegisterTest extends DuskTestCase
{
    public function test_can_register_from_home_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/')
                ->clickLink('Register')
                ->assertRouteIs(route('register'));
        });
    }

    public function test_detects_missing_fields()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit(route('register'))
                ->click('@register')
                ->assertSee('name field is required')
                ->assertSee('email field is required')
                ->assertSee('password field is required');
        });
    }

    public function test_detects_duplicate_emails()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'cgpitt@gmail.com'
        ]);

        $this->browse(function (Browser $browser) {
            $browser
                ->visit(route('register'))
                ->type('@email', 'cgpitt@gmail.com')
                ->click('@register')
                ->assertSee('email has already been taken');
        });
    }

    public function test_detects_unconfirmed_passwords()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit(route('register'))
                ->type('@password', 'password')
                ->type('@confirm-password', 'password123')
                ->click('@register')
                ->assertSee('password confirmation does not match');
        });
    }

    public function test_can_register()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit(route('register'))
                ->type('@name', 'Tester')
                ->type('@email', 'new@email.com')
                ->type('@password', 'password')
                ->type('@confirm-password', 'password')
                ->click('@register')
                ->assertPathIs('/home');
        });
    }
}
