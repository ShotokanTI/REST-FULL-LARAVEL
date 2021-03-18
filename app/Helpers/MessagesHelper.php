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
  static function Response_No_Data($RequestColunm = 'nenhum', $RequestValue = 'valor',$table = '')
  {
    echo json_encode("Não encontramos $RequestColunm: $RequestValue na tabela ou banco $table", JSON_UNESCAPED_UNICODE);
  }

  /**
   * Exibe todos os usuarios encontrados no banco
   */
  static function Response_Successfull($data)
  {
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
  }
}
