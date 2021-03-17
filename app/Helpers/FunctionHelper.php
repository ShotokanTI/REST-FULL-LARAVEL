<?php

namespace App\Helpers;

class FunctionHelper
{
    public function __construct()
    {
    }

    
    /**
     * Adiciona um novo usuario apenas se ele não existir na base de dados
     */
    static function Row_Empty_Table($istance,$colunm,$colunmValue){
       return $istance->where($colunm, $colunmValue)->get()->isEmpty();
    }

}
