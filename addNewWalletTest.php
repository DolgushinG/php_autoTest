<?php

namespace Tests\Browser;

use Tests\DuskTestCase;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;


class AddNewWalletTest extends DuskTestCase
{
    public function testBasicExample()
    {

        $array = [1, 2, 3, 4, 5];
        $randomWallet = Arr::random($array);
        $randomNumberWallet = Str::random(9);
        $this->browse(function ($browser) use ($randomWallet,$randomNumberWallet){
            $browser
                ->visit('/login')
                ->waitFor('.input-email')
                ->type('.input-email','dad2dadaswss@yopmail.com')
                ->type('password','dad2dadaswss@yopmail.com')
                ->click('.authBtn')
                ->waitFor('.profile-info__avatar')
                ->click('.profile-info__avatar')
                ->click('div.payment-add__systems > span:nth-child('.$randomWallet.')')
                ->type('.payment-add__input',''.$randomNumberWallet)
                ->click('.payment-add__button')
                ->waitFor('.informer-list__item-text')
                ->assertSeeIn('.informer-list__item-text', 'Новый кошелек успешно добавлен');

        });
    }
}
