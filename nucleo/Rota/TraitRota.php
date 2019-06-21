<?php

namespace br\univali\sisnet\mvc\nucleo\Rota;

trait TraitRota
{

    private $parametros;
    private $rota;

    public function parametros($parametros)
    {
        $this->parametros = $parametros;
    }

    public function rotas($rota)
    {
        $this->rota = $rota;
    }

    public function adicionarParametro($chave, $valor)
    {
        $this->parametros[$chave] = $valor;
    }

    public function obterParametro($chave)
    {

        if (isset($this->parametros[$chave])) {
            return $this->parametros[$chave];
        }

        $chave = $chave . ".";
        $configuracoesEncontradas = array_filter($this->parametros, function ($item, $k) use ($chave) {
            return (substr($k, 0, strlen($chave)) === $chave);
        }, ARRAY_FILTER_USE_BOTH);

        $resultado = [];
        array_walk($configuracoesEncontradas, function ($item, $key) use ($chave, &$resultado) {
            $key = str_replace($chave, '', $key);
            $resultado[$key] = $item;
        });

        if (count($resultado) > 0) {
            return $resultado;
        }

        throw new \Exception("Chave não encontrada: {$chave}");

    }

    public function buscarRota($url, $metodo = 'GET')
    {
        return $this->rota->buscarRota($url, $metodo);
    }

    public function listarRotar()
    {
        return $this->rota->listarRotar();
    }

   
}