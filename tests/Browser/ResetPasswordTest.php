<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ResetPasswordTest extends DuskTestCase
{

    public function test_you_can_see_password_reset_form()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/password/reset')
                ->assertSee('Reset Password');
        });
    }
}
