<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$posts = Post::getPosts();

		return view('post.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('post.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StorePostRequest $request) {
		$validated = $request->validated();

		$post = Post::storePostApi($request);

		if (isset($post[0]['field'])) {
			return redirect()
				->back()
				->withErrors(['failed' => 'Sua postagem não foi salva.'])
				->withInput();
			
		} else {
			$message = 'Postagem realizada com sucesso.';
			
			$post['name'] = $request->session()->get('user.name');
			$post['comments'] = null;
					
			return view('post.show', compact(
				[
					'post',
					'message',
				])
			);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  $postId
	 * @return \Illuminate\Http\Response
	 */
	public function show($postId) {
		$post = Post::getPost($postId);

		return view('post.show', compact(
						[
							'post',
						]
		));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Post $post) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Post $post) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Post $post) {
		//
	}

}
