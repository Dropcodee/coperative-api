<?php


namespace App\Repository;


class UserRepository implements UserRepositoryInterface
{
    public function authenticateUser($credentials) {
        $user = 'new user here';
        # apiformat lives in the user model
        # used for filtering our api response data of users
        return $user->apiformat();
    }
}
