<?php

use br\univali\sisnet\mvc\nucleo\Controlador;
use br\univali\sisnet\mvc\nucleo\RespostaJson;
use br\univali\sisnet\mvc\nucleo\RespostaTwig;

/**
 * @author 1978233
 */
class Cliente extends Controlador
{

    public function listarClientes()
    {
        if ($this->requisicao->obterParametro("nome") == 'maria') {
            return new Redirecionamento("http://www.univali.br");
        }
        $clientes[] = "joao";
        $clientes[] = "maria";
        $clientes[] = "jose";
        $clientes[] = "huguinho";
        $clientes[] = "zezinho";
        $clientes[] = "luiziho";
        //return new RespostaTwig("clientes.html.twig",array("clientes"=>$clientes));
        return new RespostaJson($clientes);
    }
}
