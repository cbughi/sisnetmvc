<?php

namespace br\univali\sisnet\mvc\nucleo\ComandLine;

trait TraitConfiguracaoComando
{
    private $comandos;

    public function comandos($comandos)
    {
        $this->comandos = $comandos;
    }

    public function obterComandos()
    {
        return $this->comandos;
    }

    public function adicionarComando(ContratoComando $comando)
    {

        $this->comandos[$comando->parametroLongo] = [
            'parametroLongo' => $comando->parametroLongo,
            'descricao' => $comando->descricao,
            'parametroCurto' => $comando->parametroCurto,
            'comando' => $comando
        ];
    }

}