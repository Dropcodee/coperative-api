<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateRegisterInputRequest;
use App\Repository\UserRepositoryInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller {

	/**
	 * @var UserRepository
	 */
	private $userRepository;

	public function __construct(UserRepositoryInterface $userRepository) {
	    $this->middleware('auth:api', ['except' => ['login', 'register']]);
		$this->userRepository = $userRepository;
	}

	public function login(Request $request) {
		# get api request data i.e user credentials
		$credentials = $request->only('email', 'password');
		# authenticate user credentials using UserRepository function authenticateUser
		$result = $this->userRepository->authenticateUser($credentials);
		if($result['status'] === 'success') {
            return response()->json([
                'user' => $result['user'],
                'token' => $result['token']->original,
                'message' => $result['message'],
                'status' => $result['status']
            ], Response::HTTP_OK);
        }
		return response()->json(['error' => $result], Response::HTTP_UNAUTHORIZED);

	}

	public function register(Request $request) {
		# grabs inputs after validation
		$credentials = $request->post();
		# validate request
        $validator = $this->userRepository->registerValidate($credentials);
        if ($validator->fails()) {
			$messages = $validator->messages();
			$errors = $messages->all();
			return response()->json(['errors' => $errors, 'status' => 'error'], Response::HTTP_UNAUTHORIZED);
		}
		# create new user
		$user = $this->userRepository->createUser($credentials);
		# mail user verification token
		return response()->json([
			'message' => 'Application completed, check your mail for further information.',
			'status' => 'success',
			'user' => $user,
		], Response::HTTP_OK);
	}

	public function logout(Request $request) {
		return response()->json([
			'message' => 'Application completed, check your mail for further information.',
			'status' => 'success',
		]);
	}
}
