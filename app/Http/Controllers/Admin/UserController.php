<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\UserRepositoryInterface;

class UserController extends Controller {
	public function __construct(UserRepositoryInterface $userRepository) {
		$this->middleware('auth');
		$this->userRepository = $userRepository;
	}

	public function members() {
		# get all members of the cooperative except employees
		$members = $this->userRepository->fetchMembersOnly();
		# return view
//        dd($members);
		return view('dashboard.members')->with(['members' => $members]);
	}
}
