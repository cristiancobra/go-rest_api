<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CommentsTests extends DuskTestCase {

	/**
	 * Test if an unauthenticated user is redirected when accessing the comments index
	 *
	 * @return void
	 */
	public function test_if_unauthenticated_user_is_redirected_when_accessing_comment_index() {
		$this->browse(function (Browser $browser) {
			$browser->visit('/comment')
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
			$browser->visit('/comment/create')
					->assertPathIs('/user/create');
		});
	}

	/**
	 * Test if a authenticated user can see the index of comments
	 *
	 * @return void
	 */
	public function test_if_authenticated_user_can_see_index_comments() {
		$this->browse(function (Browser $browser) {
			$browser->visit('set-session') // is authenticated
					->visit('/comment')
					->assertPresent('#comment-name');
		});
	}
	
	/**
	 * Test if a authenticated user can see the comment create
	 *
	 * @return void
	 */
	public function test_if_unauthenticated_user_can_see_create_comment() {
		$this->browse(function (Browser $browser) {
			$browser->visit('set-session') // is authenticated
					->visit('/comment/create')
					->assertPathIs('/comment/create');
		});
	}
	
	/**
	 * Test if an authenticated user can create a comment and be redirected
	 *
	 * @return void
	 */
//	public function test_if_authenticated_user_can_create_comment_and_redirected() {
//		$this->browse(function (Browser $browser) {
//			$random = rand(1,99);
//			$randomName = "José $random";
//			
//			$browser->visit('set-session') // is authenticated
//					->visit('/comment/create')	
//                    ->type('name', $randomName)
//                    ->type('body', 'Comentário TESTE teste teste teste teste teste teste - ' . $random)
//					->press('CRIAR')
//					->pause(1000)
//					->assertPathIs('/comment')
//                    ->assertPresent('.alert-success');					
//		});
//	}
}
