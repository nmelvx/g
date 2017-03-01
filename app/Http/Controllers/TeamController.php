<?php

namespace App\Http\Controllers;


use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show()
    {
        $members = $this->userRepository->getUsersByLevel(3);

        print_r($members);die;
    }
}
