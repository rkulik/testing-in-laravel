<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

/**
 * Class HomePageTest
 * @package Tests\Browser
 *
 * @author René Kulik <info@renekulik.de>
 */
class HomePageTest extends DuskTestCase
{
    /**
     *
     */
    public function testUserSeesAllTasks()
    {
        $this->browse(
            function (Browser $browser) {
                $browser->visit('/')
                    ->assertSee('All Tasks');
            }
        );
    }
}
