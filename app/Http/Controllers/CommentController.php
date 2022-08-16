<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Support\Facades\Http;

class CommentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$comments = Comment::getComments();

		return view('comment.index', compact('comments'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 *@param string $post_title Post title coming from the COMENTAR link
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request) {
		if ( $request->post_id ) {
			$posts = Comment::getPost($request->post_id);
			
		} else {
			$posts = Comment::getPosts();
		}

		return view('comment.create', compact(
			[
				'posts',
			]
		));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreCommentRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreCommentRequest $request) {
		$validated = $request->validated();

		$comment = Comment::storeCommentApi($request);

		if (isset($comment[0]['field'])) {
			return redirect()
							->back()
							->withErrors(['failed' => 'Seu comentário não foi salvo.'])
							->withInput();
			
		} else {
			$message = 'Postagem realizada com sucesso.';
			
			$comment['title'] = Comment::getPostTitleByComment($comment['post_id']);

			return view('comment.show', compact(
							[
								'comment',
								'message',
			]));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Comment  $comment
	 * @return \Illuminate\Http\Response
	 */
	public function show($comment) {
		$comment = Comment::getComment($comment);

		return view('comment.show', compact(
						[
							'comment',
						]
		));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Comment  $comment
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Comment $comment) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Comment  $comment
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Comment $comment) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Comment  $comment
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Comment $comment) {
		//
	}

}
