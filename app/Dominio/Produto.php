<?php

namespace App\Dominio;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Produto extends Eloquent
{

    public $timestamps = false;

    protected $fillable = [
        'nome_produto',
        'estoque_minimo',
        'estoque_maximo',
        'estoque_atual'
    ];

}
