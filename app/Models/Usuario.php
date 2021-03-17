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

    public function setData_NascimentoDateAttribute($value)
    {
       return $this->attributes['Data_Nascimento'] = Carbon::createFromDate('Y/m/d', $value)->format('d/m/Y');
    }
}
