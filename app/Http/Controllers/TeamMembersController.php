<?php

namespace App\Http\Controllers;


use App\Repositories\UserRepository;
use App\TeamMembers;
use App\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class TeamMembersController extends Controller
{

    protected $userRepository;
    protected $teamMembersModel;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->teamMembersModel = new TeamMembers();
    }

    public function index()
    {
    }

    public function create(){

    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|numeric|max:20',
            'password' => 'required|min:6'
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
            $this->teamMembersModel->name = $request->input('name');
            $this->teamMembersModel->user_id = $request->input('user_id');

            $member = $this->teamMembersModel->save();

            if($member){

            }

            return Response::json(array('success' => true), 200);

        }
        die;
    }
}
