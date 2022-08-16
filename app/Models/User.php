<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Http;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'gender',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	
	/**
	 * 
	 * @param type $request
	 * @return type $response
	 */
	public static function storeUserApi($request) {
		$token = env('GOREST_TOKEN');
		
		$responseJson = Http::withToken($token)->post('https://gorest.co.in/public/v2/users', [
			'name' => $request->name,
			'gender' => $request->gender,
			'email' => $request->email,
			'status' => $request->status,
		]);
		
		$response = json_decode($responseJson, true);
		
		return $response;
	}
}
