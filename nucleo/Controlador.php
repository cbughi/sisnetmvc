<?php

namespace br\univali\sisnet\mvc\nucleo;

class Controlador
{

    /**
     * @var Requisicao
     */
    protected $requisicao;
    /**
     * @var Configuracao configuracao
     */
    protected $configuracao;

    public function __construct(Requisicao $requisicao)
    {
        $this->configuracao = Configuracao::getInstance();

        if ($requisicao instanceof Requisicao) {
            $this->requisicao = $requisicao;
        }
    }

}
