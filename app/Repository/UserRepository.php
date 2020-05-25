<?php


namespace App\Repository;


use App\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function authenticateUser($credentials) {
        $user = 'new user here';
        # apiformat lives in the user model
        # used for filtering our api response data of users
        return $user->apiformat();
    }

    public function createUser($credentials) {
        # generate verification token
        $credentials['verification_token'] = str_random(60);
        # hash user password
        $credentials['password'] = Hash::make($credentials['password']);
        # create user
        $newUser = User::create($credentials);
        # add role to new user
        $newUser->assignRole('member');
        return $newUser;
    }

    public function mailUser($userdetails) {
        return $userdetails;
    }
     public function mailGuarantor($userdetails) {
        return $userdetails;
    }
}
