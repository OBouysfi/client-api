<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientRessource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ClientController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ClientRessource::collection(Client::all());
    }
    public function store(Request $request, Client $client) : ClientRessource
    {
        $validated = $request->validate([
            "full_name" => "required|min:3",
            "phone" => "nullable|string",
            "email" => "nullable|email",
            "address" => "nullable|min:3|max:255",
        ]);
    
        $client = Client::query()->create($validated);
        return ClientRessource::make($client);
    }
    public function update(Request $request, Client $client) : ClientRessource
    {
        $validated = $request->validate([
            "full_name" => "required|min:3",
            "phone" => "nullable|string",
            "email" => "nullable|email",
            "address" => "nullable|min:3|max:255",
        ]);
        $client->update($validated);
        return ClientRessource::make($client);
    }
    public function destroy(Client $client) : ClientRessource
    {
        $client->delete();
        return ClientRessource::make($client);
    }
}
