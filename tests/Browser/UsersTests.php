<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use withFaker;

class UsersTests extends DuskTestCase
{
    /**
     * Test if user index returns a list of users with 'h3' selector and id 'username'
     *
     * @return void
     */
    public function test_if_user_index_returns_a_list_of_users()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/user')
                    ->assertPresent('#user-name');
        });
    }
	
    /**
     * Test if user logged out see on route 'create' error message
     *
     * @return void
     */
    public function test_if_user_logged_out_see_on_route_create_a_error_message()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/user/create')
                    ->assertDontSeeLink('/logout') // Logged OUT
                    ->assertPresent('.alert-danger');
        });
    }
	
    /**
     * Test if form creates user and logout directs to 'user create'
     *
     * @return void
     */
    public function test_if_form_creates_user_and_logout_directs_to_user_create()
    {
        $this->browse(function (Browser $browser) {
			$random = rand(1,99);
			$randomEmail = "jose$random@mail.com";
			$randomName = "José $random";
			
            $browser->visit('/user/create')
                    ->assertDontSeeLink('/logout') // Logged OUT
                    ->type('name', $randomName)
                    ->type('email', $randomEmail)
                    ->select('gender')
                    ->select('status')
					->press('CRIAR')
					->pause(1000)
					->assertPathIs('/user')
					->assertSee('Usuário cadastrado com sucesso.')
                    ->press('SAIR');
			
        });
    }
}