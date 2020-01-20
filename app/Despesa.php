<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $fillable = [
        'valorDespesa',
        'pago',
        'dataPagamento',
        'descricaoDespesa',
        'conta_id'
    ];

    public function conta()
    {
        return $this->belongsTo('App\Conta');
    }
}
