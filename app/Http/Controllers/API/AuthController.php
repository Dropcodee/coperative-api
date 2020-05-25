<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(Request $request) {
        # get api request data i.e user credentials
        $credentials = $request->post();
        # authenticate user credentials using UserRepository function
        # authenticate users & return user details & token
        $user = $this->userRepository->authenticateUser($credentials);
        return response()->json(['message' => 'Logged you in now' ]);
    }

     public function register(Request $request) {
        return response()->json(['message' => 'Logged you out now' ]);
    }

    public function logout(Request $request) {
        return response()->json(['message' => 'registered you now' ]);
    }
}
