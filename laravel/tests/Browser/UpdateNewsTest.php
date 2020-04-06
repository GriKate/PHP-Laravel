<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    //use RefreshDatabase;

    public function testUpdate() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                ->clickLink('Изменить')
                ->assertPathIs('/admin/updateNews1');
        });
    }
}
