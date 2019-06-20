<?php


namespace br\univali\sisnet\mvc\nucleo\filtro;

use br\univali\sisnet\mvc\nucleo\Requisicao;

interface FiltroAbstrato
{
    public function filtrar(Requisicao $requisicao, array $parametros);

    public function filtrarProximo(FiltroAbstrato $filtroAbstrato);
}