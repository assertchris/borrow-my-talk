<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    public function test_can_login_from_home_page()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/')
                ->clickLink('Login')
                ->assertRouteIs('login');
        });
    }

    public function test_detects_empty_fields()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit(route('login'))
                ->click('@submit')
                ->pause(500)
                ->assertSee('email field is required')
                ->assertSee('password field is required');
        });
    }

    private function getUser()
    {
        return User::where('email', 'cgpitt@gmail.com')->first();
    }

    public function test_detects_bad_credentials()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit(route('login'))
                ->type('@email', 'foo@bar.baz')
                ->type('@password', 'bar')
                ->click('@submit')
                ->pause(500)
                ->assertSee('credentials do not match our records');
        });
    }

    public function test_can_log_in()
    {
        $this->browse(function (Browser $browser) {
            $user = $this->getUser();

            $browser
                ->visit(route('login'))
                ->type('@email', $user->email)
                ->type('@password', 'password')
                ->click('@submit')
                ->pause(500)
                ->assertSee('You are logged in!');
        });
    }
}
