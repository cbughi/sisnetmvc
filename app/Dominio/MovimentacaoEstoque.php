<?php

namespace App\Dominio;

use Illuminate\Database\Eloquent\Model as Eloquent;

class MovimentacaoEstoque extends Eloquent
{

    public $timestamps = false;

    protected $fillable = [
        'produto_id',
        'tipo_movimento',
        'quantidade'
    ];

}
