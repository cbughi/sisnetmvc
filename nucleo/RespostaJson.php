<?php

namespace br\univali\sisnet\mvc\nucleo;

use br\univali\sisnet\mvc\nucleo\Cabecalho;

class RespostaJson extends Resposta
{

    private $dado;

    public function __construct($dado)
    {
        $this->dado = $dado;
    }

    public function executar()
    {
        Cabecalho::getInstance()->adicionarCabecalhoResposta("Content-type", "application/json");
        return json_encode($this->dado);
    }

}
