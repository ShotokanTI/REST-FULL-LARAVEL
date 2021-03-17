<?php

namespace App\Helpers;
class MessagesHelper
{
    public function __construct()
    {
    }
    /**
     * Retorna uma mensagem explicando que não existe dados de usuarios
     */
    static function Response_No_Data()
    {
      echo json_encode('Não encontramos este dado na base de dados', JSON_UNESCAPED_UNICODE);
    }

    /**
     * Exibe todos os usuarios encontrados no banco
     */
    static function Response_Successfull($data){
       echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }
}
