<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testTitle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/addNews')
                    ->type('title', '123')
                    ->press('Добавить новость')
                    ->assertSee('Количество символов в поле "Заголовок новости" должно быть не менее 5')
                    ->assertPathIs('/admin/addNews');
        });
    }

    public function testFile()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/addNews')
                ->attach('image', 'public/1.txt')
                ->press('Добавить новость')
                ->assertSee('Поле "Фото новости" должно быть файлом одного из следующих типов: jpeg, jpg, bmp, png')
                ->assertPathIs('/admin/addNews');
        });
    }

    public function testFormEmpty()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/addNews')
                ->press('Добавить новость')
                ->assertSee('Поле "Заголовок новости" обязательно для заполнения')
                ->assertSee('Поле "Текст новости" обязательно для заполнения')
                ->assertPathIs('/admin/addNews');
        });
    }
}
