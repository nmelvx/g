<?php

namespace App\Http\Controllers;


use App\Repositories\UserRepository;
use App\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{

    protected $userRepository;
    protected $teamsModel;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->teamsModel = new Teams();

    }

    public function index()
    {
        $members = $this->userRepository->getUsersByLevel(3);
        $leaders = $this->userRepository->getUsersByLevel(2);

        $teams = $this->teamsModel
            ->with('leader')
            ->with('members')
            ->get();

        return view('management.teams_management.index', compact('members', 'leaders', 'teams'));
    }
}
