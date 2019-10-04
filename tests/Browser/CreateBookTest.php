<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateBookTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function testCreateBookFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cp-admin/book/create')
                ->type('title', 'WAS no pictures or a dance is not a long to see such as, Sure, it away under her in a voice of.')
                ->check('author[]', 3)
                ->type('number_page', 123)
                ->select('publisher_id', 2)
                ->select('category_id', 3)
                ->type('price', 200000)
                ->press('Create Book')
                ->assertSee('Create Book')
                ->assertRouteIs('book.create');
        });
    }

    public function testListBook()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cp-admin/book')
                ->assertSee('Search')
                ->click('.button_id')
                ->waitForLocation('/cp-admin/book/show')
                ->assertPathIsNot('/cp-admin/book/show');
        });
    }

    public function testCreateBookTrue()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cp-admin/book/create')
                ->type('title', 'rrrrrr')
                ->check('author[]', 3)
                ->keys('.cke_wysiwyg_frame', 'too few arguments')
                ->attach('image', __DIR__.'/images/image1.jpeg')
                ->type('number_page', 123)
                ->select('publisher_id', 2)
                ->select('category_id', 3)
                ->type('price', 200000)
                ->assertSee('Create Book')
                ->press('Create Book')
                ->assertPathIs('/cp-admin/book');
        });
    }
}
