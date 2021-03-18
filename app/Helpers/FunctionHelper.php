<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class FunctionHelper
{
    public function __construct()
    {
    }


    /**
     * Adiciona um novo usuario apenas se ele não existir na base de dados
     */
    static function Row_Empty_Table($istance, $colunm, $colunmValue)
    {
        return $istance->where($colunm, $colunmValue)->get()->isEmpty();
    }

    static function getUsersByCityOrState($CityOrState, $param)
    {
        return DB::table('usuarios')
            ->join('enderecos', 'usuarios.Cpf', '=', 'enderecos.Usuario_Cpf')
            ->where('enderecos.' . $CityOrState, $param)
            ->distinct('usuarios.id')
            ->count('usuarios.id');
    }
}
