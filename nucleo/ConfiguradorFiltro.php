<?php


namespace br\univali\sisnet\mvc\nucleo;

use br\univali\sisnet\mvc\nucleo\filtro\FiltroAbstrato;
use br\univali\sisnet\mvc\nucleo;

class ConfiguradorFiltro
{

    private $filtros = [];

    public function adicionarFiltro($requisicao, $url, $filtro)
    {
        $this->filtros[] = array(
            'requisicao' =>  $requisicao,
            'url'        => $url,
            'filtro'     => $filtro
        );
    }

    public function buscarFiltro($url, $requisicao) :? FiltroAbstrato
    {
        $primeiroFiltro = null;

        $atual = null;
        $anterior = null;

        foreach ($this->filtros as $filtro) {
            if ($filtro['url'] == $url && $filtro['requisicao'] == $requisicao){

                $atual = new $filtro['filtro']();

                if ($anterior != null){
                    $anterior->definirProximo($atual);
                }

                if ($primeiroFiltro == null){
                    $primeiroFiltro = $atual;
                }

                $anterior = $atual;
            }
        }

        return $primeiroFiltro;
/*
        foreach ($this->filtros as $filtro) {
            if ($filtro['url'] == $url && filtro['requisicao'] == $requisicao){
                if (is_null($filtro)){
                    $primeiroFiltro = new $filtro();
                } else {
                    $proximo->definirProximo($filtro['filtro']);
                }
                $proximo = $filtro['proximo'];
            }
        }
        return $primeiroFiltro;*/
    }

    public function listarFiltros()
    {
        return $this->filtros;
    }
}