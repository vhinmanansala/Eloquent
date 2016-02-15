<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientRequest;
use App\OrganisationsClients;
use App\UserOrganisationRole;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    public function create()
    {
        return view('clients.create', compact('roles'));
    }

    public function store(ClientRequest $request)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
        }

        $client = Client::create([
            'name' => $request['name'],
            'creator_user_id' => $userId
        ]);
        
        $userOrganisationRole = UserOrganisationRole::find($userId);

        $organisationClient = OrganisationsClients::create([
            'organisation_id' => $userOrganisationRole->organisation_id,
            'client_id' => $client->id
        ]);
        
        $organisationClient->clients()->save($client);
        
        return redirect('clients/create');
    }
}
