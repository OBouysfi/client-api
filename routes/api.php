<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Resources\ClientRessource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/say-hello', function(Request $request){
    return ['message'=> 'TEST OK!'];
});
Route::resource('/clients' , ClientController::class)->except('create','edit');