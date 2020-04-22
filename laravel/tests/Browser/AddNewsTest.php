<?php

namespace Tests\Browser;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNewsTest extends DuskTestCase {

    use RefreshDatabase;

    public function testAddNews()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/addNews')
                ->type('title', '123456')
                ->select('category_id')
                ->type('text', 'test')
                ->press('Добавить новость')
                ->assertPathIs('/admin');
        });
    }
}
