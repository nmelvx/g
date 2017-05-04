<?php

namespace App\Http\Controllers;


use App\Repositories\UserRepository;
use App\TeamMembers;
use App\Teams;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Ultraware\Roles\Models\Role;

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
            'phone' => 'required|numeric',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails())
        {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 200);
        }
        else
        {
            $member = User::create([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'password' => bcrypt($request->input('password')),
                'visible_password' => $request->input('password'),
            ]);

            $role = Role::find(4);
            $member->attachRole($role);

            if($member) {

                $this->teamMembersModel->team_id = $request->input('team_id');
                $this->teamMembersModel->user_id = $member->id;

                $this->teamMembersModel->save();

                return Response::json(array('success' => true), 200);

            }


            return Response::json(array('success' => false), 200);
        }
        die;
    }
}
