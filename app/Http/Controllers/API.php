<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Helpers\MessagesHelper;
use App\Helpers\FunctionHelper;
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
        $allUsers = Usuario::all();
        if ($allUsers->isEmpty()) {
            return MessagesHelper::Response_No_Data();
        }
        return MessagesHelper::Response_Successfull($allUsers);
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
    public function store(Request $request)
    {

        $user = new Usuario();
        $user->fill($request->all());

        $endereco = new Endereco();
        $endereco->fill($request->all());

        if (FunctionHelper::Row_Empty_Table($user,'Cpf',$request->Cpf)) {
            $user->save();
        }
        $user->endereco()->save($endereco);

        return  MessagesHelper::Response_Successfull(array_merge(json_decode($user,true),json_decode($endereco,true)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = new Usuario();
        $colunm = 'id';
        if (FunctionHelper::Row_Empty_Table($user,$colunm,$id)) {
            return MessagesHelper::Response_No_Data($colunm,$id);
        }
        return MessagesHelper::Response_Successfull($user->find($id));
    }

    public function result_not_exist($row)
    {
        return empty($row) || is_null($row);
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
    public function destroy($id = null)
    {
        try {
            $user = Usuario::find($id);
            if (!empty($user)) {
                $user->delete();
                echo json_encode("Mensagem:Usuario deletado com sucesso", JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode("Error:Não achamos este usuario na base de dados!", JSON_UNESCAPED_UNICODE);
            }
        } catch (\Exception $e) {
            if (is_null($id)) {
                return json_encode("Error:Não achamos este usuario na base de dados!", JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
