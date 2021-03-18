<?php

use App\Helpers\MessagesHelper;
use App\Helpers\FunctionHelper;
use App\Http\Controllers\API;
use App\Http\Controllers\API_ENDERECO;
use App\Models\Endereco;
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

Route::resource('/usuarios', API::class);

Route::resource('/enderecos', API_ENDERECO::class);

Route::get('/cidades', function () {

    $allCitys = Endereco::all('id', 'Cidade');

    if (!$allCitys->isEmpty()) {
        return json_encode($allCitys, JSON_PRETTY_PRINT);
    } else {
        return MessagesHelper::Response_No_Data();
    }
});

Route::get('/cidades/{id}', function ($id) {
    $citysId = Endereco::select('id', 'Cidade')->where('id', $id)->get();
    if (!$citysId->isEmpty()) {
        return json_encode($citysId, JSON_PRETTY_PRINT);
    } else {
        return MessagesHelper::Response_No_Data();
    }
});


Route::get('/estados', function () {
    $states = Endereco::all('id', 'Estado');
    if (!$states->isEmpty()) {
        return json_encode($states, JSON_PRETTY_PRINT);
    } else {
        return MessagesHelper::Response_No_Data();
    }
});

Route::get('/estados/{id}', function ($id) {
    $states = Endereco::select('id', 'Estado')->where('id', $id)->get();
    if (!$states->isEmpty()) {
        return json_encode($states, JSON_PRETTY_PRINT);
    } else {
        return MessagesHelper::Response_No_Data();
    }
});


Route::get('totalUsersByCityOrState/{CityOrState}/{param}', function ($CityOrState, $param) {
    $totalUsers = FunctionHelper::getUsersByCityOrState($CityOrState, $param);
    if ($totalUsers) {
        return json_encode("Total de usuarios cadastrados $CityOrState de $param = " . $totalUsers, JSON_PRETTY_PRINT);
    } else {
        return MessagesHelper::Response_No_Data();
    }
});
