<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = [
        'saldoConta',
        'descricaoConta',
        'tipoConta',
        'incluirSaldoNaTela'
    ];

    public function receitas()
    {
        return $this->hasMany('App\Receita');
    }

    public function despesas()
    {
        return $this->hasMany('App\Despesa');
    }
}
