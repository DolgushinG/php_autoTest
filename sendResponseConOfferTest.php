<?php

namespace Tests\Browser;

use Tests\DuskTestCase;



class SendResponseConOfferTest extends DuskTestCase
{
    public function testSendResponseConOfferTest()
    {

        $this->browse(function ($browser) {
            $browser
                ->visit('/login')
                ->waitFor('.input-email')
                ->type('.input-email','simon@test.test')
                ->type('password','simon@test.test')
                ->click('.authBtn')
                ->waitFor('.app__sidebar')
                ->clickAtXPath('//*[@id="app"]/div/div/div[2]/nav/ul/li[2]')
                ->pause(1000)
                ->click('#app > div > div > div.app__content.layout > div.layout__page-content > div > div.offer-list__table > div > table > tbody > tr:nth-child(1) > td:nth-child(2) > div > span')
                ->waitFor('.offer-request-access__text-area')
                ->type('.offer-request-access__text-area','Подключите оффер плз')
                ->click('.offer-request-access__request')
                ->waitFor('.informer-list__item-text')
                ->assertSeeIn('.informer-list__item-text', 'Тикет успешно создан!');
        });
    }
}
