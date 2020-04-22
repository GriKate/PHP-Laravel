<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testDelete() {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin')
                ->clickLink('Удалить')
                ->assertPathIs('/admin');
        });
    }
}
