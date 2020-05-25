<?php

namespace App\Repository;

interface UserRepositoryInterface
{
    public function authenticateUser($credentials);
}
