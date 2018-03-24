<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PasswordResetTest extends DuskTestCase
{
    public function test_you_can_see_password_reset_form()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit(route('password.request'))
                ->assertSee('Reset Password');
        });
    }

    public function test_it_detects_missing_fields()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit(route('password.request'))
                ->click('@submit')
                ->assertSee('email field is required');
        });
    }

    public function test_it_detects_non_existing_emails()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit(route('password.request'))
                ->type('@email', 'janedoe@example.com')
                ->click('@submit')
                ->assertSee("can't find a user with that e-mail address");
        });
    }

    public function test_it_can_reset_a_password()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit(route('password.request'))
                ->type('@email', 'cgpitt@gmail.com')
                ->click('@submit')
                ->assertSee('We have e-mailed your password reset link!');
        });
    }
}
