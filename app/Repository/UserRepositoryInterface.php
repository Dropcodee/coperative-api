<?php

namespace App\Repository;

interface UserRepositoryInterface {
	public function authenticateUser($credentials);
	public function registerValidate($credentials);
	public function createUser($credentials);
}
