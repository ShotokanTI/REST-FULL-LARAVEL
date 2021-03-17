<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class API extends Controller
{

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_encode(Usuario::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return Usuario::create([
            'Nome' => request('Nome'),
            'Sobrenome' => request('Sobrenome'),
            'Data_Nascimento' => request('Data_Nascimento'),
            'Cpf' => request('Cpf'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $user = Usuario::find($id);
            if ($user ?? false)
                $user->update($request->all());
            return json_encode("Sucesso:Usuario com CPF : $user->Cpf atualizado com sucesso!");
        } catch (\Exception $e) {
            return json_encode("Error:Este ID não existe em nossa base de dados!", JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Usuario::find($id);
        if (!empty($user)) {
            $user->delete();
            return json_encode("Mensagem:Usuario deletado com sucesso",JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode("Error:Não achamos este usuario na base de dados!",JSON_UNESCAPED_UNICODE);
        }
    }
}
