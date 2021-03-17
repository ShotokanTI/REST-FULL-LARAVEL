<?php

use App\Http\Controllers\API;
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

// function userToArray($user)
// {
//     return json_decode($user, TRUE);
// }

// function iterateUser($user){
//     foreach (userToArray($user) as $key => $value) {
//         $user->$key = request($key);
//     }
// }

// Route::get('/users', function () {
//     return json_encode(Usuario::all());
// });

// Route::put('updateuser/{id}', function ($id) {
//     $user = Usuario::find($id);
//     iterateUser($user);
//     $user->save();
//     return json_encode($user, JSON_UNESCAPED_UNICODE);
// });

// Route::post('/createuser', function () {
//     return Usuario::create([
//         'Nome' => request('Nome'),
//         'Sobrenome' => request('Sobrenome'),
//         'Data_Nascimento' => request('Data_Nascimento'),
//         'Cpf' => request('Cpf'),
//     ]);
// });
