<?php

namespace br\univali\sisnet\mvc\nucleo\filtro;

trait TraitFiltro {

    private $filtro;

    public function filtros($filtros)
    {
        $this->filtros = $filtros;
    }
  
    public function listarFiltro()
    {
        return $this->filtros->listarFiltro();
    }

    public function obterConfiguradorFiltro():ConfiguradorFiltro
    {
        return $this->filtros;
    }


}