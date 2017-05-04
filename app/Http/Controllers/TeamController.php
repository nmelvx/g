<?php

namespace App\Http\Controllers;


use App\Repositories\UserRepository;
use App\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

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

        //dd($teams);

        return view('management.teams_management.index', compact('members', 'leaders', 'teams'));
    }

    public function create(){

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'user_id' => 'required|numeric'
        ]);

        if ($validator->fails())
        {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400);
        }
        else
        {
            $this->teamsModel->name = $request->input('name');
            $this->teamsModel->user_id = $request->input('user_id');

            $this->teamsModel->save();

            return Response::json(array('success' => true), 200);

        }
        die;
    }
}
