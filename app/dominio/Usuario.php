<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Usuario
 *
 * @author 1978233
 */
class Usuario extends Eloquent{
    protected $fillable = [
       'login', 'nome', 'senha'
    ];
}
