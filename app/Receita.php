<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $fillable = [
        'valorReceita',
        'recebido',
        'dataRecebimento',
        'descricaoReceita',
        'conta_id'
    ];

    public function conta()
    {
        return $this->belongsTo('App\Conta');
    }
}
