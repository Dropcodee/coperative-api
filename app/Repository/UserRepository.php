<?php

namespace App\Repository;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserRepository implements UserRepositoryInterface {
	public function authenticateUser($credentials) {

		# authenticate user credentials with our db data
		if (!$token = auth()->guard('api')->attempt($credentials)) {
			return [
				'status' => 'error',
				'message' => 'invalid credentials',
			];
		}
		# after authentication is done fetch user
		$user = User::where('email', $credentials['email'])->first();
		# format data to be sent to frontend remove password & some fragile data.
		$user = $user->format();
		# add user token to user data
		$token = $this->respondWithToken($token);
		return array(
			'status' => 'success',
			'message' => 'successfully logged in',
			'user' => $user,
			'token' => $token,
		);
	}
	protected function respondWithToken($token) {
		return response()->json(array(
			'api_token' => $token,
			'token_type' => 'bearer',
			// 'expires_in' => auth()->factory()->getTTL() * 60,
		));
	}
	public function createUser($credentials) {
		# generate verification token
		$credentials['verification_token'] = Str::random(60);
		# hash user password
		$credentials['password'] = Hash::make($credentials['password']);
		# create user
		$newUser = User::create($credentials);
		# add role to new user
		$newUser->assignRole('member');
		return $newUser;
	}
	public function registerValidate($credentials) {
		$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email|unique:users',
			'guarantor_mail' => 'required|email',
			'password' => 'required|min:6',
			'phone_number' => 'required|unique:users',
		);
		$messages = array(
			'first_name.required' => 'first name is required',
			'last_name.required' => 'last name is required',
			'email.unique' => 'this email is already taken',
			'email.required' => 'email is required',
			'phone_number.unique' => 'this phone number is already taken',
			'guarantor_mail.required' => 'please you need a guarantor',
		);
		return Validator::make($credentials, $rules, $messages);
	}
	public function mailUser($userdetails) {
		return $userdetails;
	}
	public function mailGuarantor($userdetails) {
		return $userdetails;
	}
	public function fetchMembersOnly() {
		# first filter users & get members only
        return User::orderBy('first_name')
            ->with('roles')
            ->get()
            ->map( function ($member) {
                return [
					'member_id' => $member->id,
                    'first_name' => $member->first_name,
                    'last_name' => $member->last_name,
					'email' => $member->email,
					'phone' => $member->phone_number,
					'admin_approved' => $member->approved,
					'guarantor_approved' => $member->guarantor_approved,
					'mail_verified' => $member->email_verified_at,
                    'role' => $member->getRoleNames()
				];
            });
	}
}
