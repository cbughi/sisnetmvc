<?php

namespace br\univali\sisnet\mvc\nucleo\filtro;

use br\univali\sisnet\mvc\nucleo\Requisicao;

abstract class FiltroAbstrato
{
    private $proximo;

    public function definirProximo(FiltroAbstrato $proximo)
    {
        $this->proximo = $proximo;
    }

    public abstract function filtrar(Requisicao $requisicao);

    public function obterProximo()
    {
        return $this->proximo;
    }
}