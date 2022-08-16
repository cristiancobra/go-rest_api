<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostsTests extends DuskTestCase {

	/**
	 * Test if an unauthenticated user is redirected when accessing the post index
	 *
	 * @return void
	 */
	public function test_if_unauthenticated_user_is_redirected_when_accessing_post_index() {
		$this->browse(function (Browser $browser) {
			$browser->visit('/post')
					->assertPathIs('/user/create');
		});
	}
	
	
	/**
	 * Test if an unauthenticated user is redirected when accessing the post create
	 *
	 * @return void
	 */
	public function test_if_unauthenticated_user_is_redirected_when_accessing_post_create() {
		$this->browse(function (Browser $browser) {
			$browser->visit('/post/create')
					->assertPathIs('/user/create');
		});
	}
	
	/**
	 * Test if a authenticated user can see the index of posts
	 *
	 * @return void
	 */
	public function test_if_authenticated_user_can_see_index_posts() {
		$this->browse(function (Browser $browser) {
			$browser->visit('set-session') // is authenticated
					->visit('/post')
					->assertPresent('#post-name');
		});
	}
	
	/**
	 * Test if a authenticated user can see the post create
	 *
	 * @return void
	 */
	public function test_if_authenticated_user_can_see_create_post() {
		$this->browse(function (Browser $browser) {
			$browser->visit('set-session') // is authenticated
					->visit('/post/create')
					->assertPathIs('/post/create');
		});
	}
	
	/**
	 * Test if an authenticated user can create a post and be redirected
	 *
	 * @return void
	 */
	public function test_if_authenticated_user_can_create_post_and_redirected() {
		$this->browse(function (Browser $browser) {
			$random = rand(1,99);
			
			$browser->visit('set-session') // is authenticated
					->visit('/post/create')	
                    ->type('title', 'Título teste ' . $random)
                    ->type('body', 'Mensagem TESTE teste teste teste teste teste teste - ' . $random)
					->press('CRIAR')
					->pause(1000)
					->assertPathIs('/post')
                    ->assertPresent('.alert-success');					
		});
	}

}
