<?php

use App\Http\Controllers\API;
use App\Http\Controllers\API_ENDERECO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('usuarios', API::class);

Route::resource('enderecos', API_ENDERECO::class);
