<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Helpers\MessagesHelper;
use App\Helpers\FunctionHelper;

class API_ENDERECO extends Controller
{

    public $local = 'Endereco';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allAdress = Endereco::all();
        if ($allAdress->isEmpty()) {
            return MessagesHelper::Response_No_Data('','',$this->local);
        }
        return MessagesHelper::Response_Successfull($allAdress);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = new Endereco();
        $colunm = 'id';
        if (FunctionHelper::Row_Empty_Table($user, $colunm, $id)) {
            return MessagesHelper::Response_No_Data($colunm, $id,$this->local);
        }
        return MessagesHelper::Response_Successfull($user->find($id));
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
            $user = Endereco::find($id);
            if ($user ?? false)
                $user->update($request->all());
            return json_encode("Sucesso:Endereco com CPF : $user->Usuario_Cpf atualizado com sucesso!");
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
        try {
            $adress = Endereco::find($id);
            if (!empty($adress)) {
                $adress->delete();
                echo json_encode("Mensagem:Endereço deletado com sucesso", JSON_UNESCAPED_UNICODE);
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
