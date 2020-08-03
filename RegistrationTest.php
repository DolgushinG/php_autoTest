<?php

namespace Tests\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Str;


class RegistrationTest extends DuskTestCase
{
    public function testBasicExample()
    {
        $generateEmail = Str::random(10).'@yopmail.com';
        $this->browse(function ($browser) use ($generateEmail) {
            $browser
                ->visit('/register')
                ->waitFor('.input-name')
                ->type('.input-name',''.Str::random(5))
                ->type('.input-email',$generateEmail)
                ->type('.input-pass',$generateEmail)
                ->type('.input-pass-conf',$generateEmail)
                ->type('.input-vk','https://vk.com/'.Str::random(5))
                ->type('.input-telegram','@'.Str::random(5))
                ->type('div:nth-child(8) > input',''.Str::random(5))
                ->check('.checkbox-t')
                ->click('.registerBtn')
                ->assertPathIs('/registration/succes');
        });
    }
}
