<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Comment extends Model {

	use HasFactory;

	protected $fillable = [
		'id',
		'post_id',
		'name',
		'email',
		'body',
	];

	/**
	 * 
	 * @return type $comments
	 */
	public static function getComment($comment) {
		$token = env('GOREST_TOKEN');

		$response = Http::withToken($token)->get('https://gorest.co.in/public/v2/comments', [
			'id' => $comment,
		]);
		$comment = json_decode($response, true);
		$comment = reset($comment);

//		 get post relationship
		$response = Http::withToken($token)->get('https://gorest.co.in/public/v2/posts', [
			'id' => $comment['post_id'],
		]);
		$post = json_decode($response, true);

		$comment['title'] = $post[0]['title'];

		return $comment;
	}

	public static function getComments() {
		$token = env('GOREST_TOKEN');

		$response = Http::withToken($token)->get('https://gorest.co.in/public/v2/comments');
		$comments = json_decode($response, true);

//		 get user relationship
		foreach ($comments as $key => $comment) {

			$response = Http::withToken($token)->get('https://gorest.co.in/public/v2/posts', [
				'id' => $comment['post_id'],
			]);

			$post = json_decode($response, true);

			$comments[$key]['title'] = $post[0]['title'];
		}

		return $comments;
	}

	public static function storeCommentApi($request) {
		$token = env('GOREST_TOKEN');

		$responseJson = Http::withToken($token)->post('https://gorest.co.in/public/v2/comments', [
			'post_id' => $request->post_id,
			'name' => $request->session()->get('user.name'),
			'email' => $request->session()->get('user.email'),
			'body' => $request->body,
		]);

		$response = json_decode($responseJson, true);
		
		return $response;
	}

	public static function getUserName($userId) {
		$token = env('GOREST_TOKEN');

		$response = Http::withToken($token)->get('https://gorest.co.in/public/v2/users', [
			'id' => $userId,
		]);

		$fields = json_decode($response, true);

		$userName = $fields[0]['name'];

		return $userName;
	}

	/**
	 * 
	 * @param type $post_id
	 * @return type
	 */
	public static function getPostTitleByComment($post_id) {
		$token = env('GOREST_TOKEN');

		$responseJson = Http::withToken($token)->get('https://gorest.co.in/public/v2/posts', [
			'id' => $post_id,
		]);

		$response = json_decode($responseJson, true);

		$post_title = $response[0]['title'];

		return $post_title;
	}
	
		/**
	 * Get Post for GOREST API
	 * 
	 * @return 
	 */
	public static function getPost($post_id) {
		$token = env('GOREST_TOKEN');

		// get post
		$response = Http::withToken($token)->get('https://gorest.co.in/public/v2/posts', [
			'id' => $post_id,
		]);
		$post = json_decode($response, true);
		$post = reset($post);

		return $post;
	}
	
		/**
	 * Get Post for GOREST API
	 * 
	 * @return 
	 */
	public static function getPosts() {		
		$token = env('GOREST_TOKEN');

		$response = Http::withToken($token)->get('https://gorest.co.in/public/v2/posts', [
//			'id' => session('user_id'),
//			'id' => $post_id,
		]);

		$posts = json_decode($response, true);
		
		$posts = reset($posts);

		return $posts;
	}

}
