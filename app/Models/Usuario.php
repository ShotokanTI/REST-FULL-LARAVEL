<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Usuario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'usuarios';
    protected $fillable = [
        'Nome', 'Sobrenome', 'Data_Nascimento', 'Cpf'
    ];
    
    /**
     * Cria a relação entre usuario e endereco.
     */
    public function endereco(){
        return $this->hasOne(Endereco::class,'Usuario_Cpf','Cpf');
    }

}
