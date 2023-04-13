<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    // Fetch all data
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    // Create
    public function create()
    {
        return view('clients.create');
    }

    // Store data
    public function store(StoreClientRequest $request)
    {
        $request->validate();

        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->client_number = $request->client_number;
        $client->business_name = $request->business_name;
        $client->save();

        $success = 'New client has been added successfuly!';

        return redirect()->route('clients.index')->with($success);
    }

    // Show data
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    // Edit data
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    // Update data
    public function update(UpdateClientRequest $request, Client $client)
    {
        $request->validate();

        $client->name = $request->name;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->client_number = $request->client_number;
        $client->business_name = $request->business_name;
        $client->save();

        $success = 'Client has been updated successfuly!';

        return redirect()->route('clients.index')->with($success);
    }

    // Delete data
    public function destroy(Client $client)
    {
        $client->delete();
        
        $success = 'Client has been deleted successfuly!';

        return redirect()->route('clients.index')->with($success);
    }
}
