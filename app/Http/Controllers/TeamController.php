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

    public function index()
    {
        $members = $this->userRepository->getUsersByLevel(3);

        return view('management.teams_management.index');
    }
}
