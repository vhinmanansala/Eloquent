<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use App\UserOrganisationRole;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }
    
    public function create()
    {
        $roles = Role::where('name', '!=', 'owner')->lists('name', 'id');
        return view('users.create', compact('roles'));
    }

    public function show()
    {
        return view('users.show');
    }

    public function store(UserRequest $request)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
        }

        $organisation = UserOrganisationRole::find($userId);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $userOrganisationRole = new UserOrganisationRole([
            'user_id' => $user->id,
            'organisation_id' => $organisation->organisation_id,
            'role_id' => $request['userRole']
        ]);

        $user->organisationRoles()->save($userOrganisationRole);

        return redirect('/users/create');
    }
}
