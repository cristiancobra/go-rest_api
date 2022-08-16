<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Http;
use Session;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$token = env('GOREST_TOKEN');

		$response = Http::withToken($token)->get('https://gorest.co.in/public/v2/users');
		$users = json_decode($response, true);

		return view('user.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreUserRequest $request) {
		$validated = $request->validated();

		$user = User::storeUserApi($request);

		if (isset($user[0]['field'])) {
			return redirect()
							->back()
							->withErrors(['failed' => 'O usuário não pode ser criado.'])
							->withInput();
			
		} else {
			$message = 'Usuário cadastrado com sucesso.';

			$request->session()->put(
				[
					'user' => $user,
				]
			);

			return view('user.show', compact(
				[
					'user',
					'message',
				]
			));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  $user_id
	 * @return \Illuminate\Http\Response
	 */
	public function show($user_id) {
		$token = env('GOREST_TOKEN');

		$response = Http::withToken($token)->get('https://gorest.co.in/public/v2/users', [
			'id' => $user_id,
		]);

		$user = json_decode($response, true);
		$user = reset($user);
		foreach ($user as $key => $value) {
			$user[$key] = $value;
		}

		return view('user.show', compact(
						[
							'user',
						]
		));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user) {
		//
	}

	public function logoutUser() {
		Session::flush();

		return redirect()->route('user.create', [
					'message' => 'Crie um usuário para iniciar'
		]);
	}

}
