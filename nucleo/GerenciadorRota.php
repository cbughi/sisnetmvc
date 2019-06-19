<?php

namespace br\univali\sisnet\mvc\nucleo;

class GerenciadorRota
{
    private $rotas;

    public function __construct($rotas = [])
    {
        $this->rotas = $rotas;
    }

    public function adicionarRota($metodo, $url, $controlador, $acao)
    {
        $this->rotas[] = array(
            'metodo' => $metodo,
            'url' => $url,
            'controlador' => $controlador,
            'acao' => $acao
        );
    }

    public function buscarRota($url, $metodo = "GET")
    {
        foreach ($this->rotas as $rota) {
            if ($rota['url'] == $url && $rota['metodo'] == $metodo) {
                return array(
                    'controlador' => $rota['controlador'],
                    'acao' => $rota['acao']
                );
            }
        }
        throw new \Exception("Rota não encontrada: [{$metodo}] {$url}");
    }

    public function listarRotar()
    {
        return $this->rotas;
    }

}
