<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Http;

class Post extends Authenticatable {

	use HasApiTokens,
	 HasFactory,
	 Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'id',
		'user_id',
		'title',
		'body',
	];

	/**
	 * Get Posts and Users relationship for GOREST API
	 * 
	 * @return 
	 */
	public static function getPosts() {
		$token = env('GOREST_TOKEN');
		$response = Http::withToken($token)->get('https://gorest.co.in/public/v2/posts');
		$posts = json_decode($response, true);

		// get user relationship
		foreach ($posts as $key => $post) {
			$response = Http::withToken($token)->get('https://gorest.co.in/public/v2/users', [
				'id' => $post['user_id'],
			]);

			$user = json_decode($response, true);
			$user = reset($user);

			$posts[$key]['name'] = $user['name'];
		}

		return $posts;
	}

	/**
	 * Get Post and User relationship for GOREST API
	 * @param int $post_id
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

		// get user relationship
		$response = Http::withToken($token)->get('https://gorest.co.in/public/v2/users', [
			'id' => $post['user_id'],
		]);
		$user = json_decode($response, true);
		$user = reset($user);
		$post['name'] = $user['name'];

		// get comments relationship
		$response = Http::withToken($token)->get('https://gorest.co.in/public/v2/comments', [
			'post_id' => $post_id,
		]);
		$comments = json_decode($response, true);

		foreach ($comments as $key => $value) {
			$comment = json_decode($response, true);
			$comment = reset($comment);

			$post['comments'][$key]['id'] = $comment['id'];
			$post['comments'][$key]['post_id'] = $comment['post_id'];
			$post['comments'][$key]['name'] = $comment['name'];
			$post['comments'][$key]['email'] = $comment['email'];
			$post['comments'][$key]['body'] = $comment['body'];
		}
		return $post;
	}

	/**
	 * Get Post and User relationship for GOREST API
	 * @param int $postId
	 * @return 
	 */
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
	 * @param type $request
	 * @return type $response
	 */
	public static function storePostApi($request) {
		$token = env('GOREST_TOKEN');
		
		$responseJson = Http::withToken($token)->post('https://gorest.co.in/public/v2/posts', [
			'user_id' => $request->session()->get('user.id'),
			'title' => $request->title,
			'body' => $request->body,
		]);
		
		$response = json_decode($responseJson, true);

		return $response;
	}

}
