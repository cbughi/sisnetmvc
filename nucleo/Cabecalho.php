<?php

namespace br\univali\sisnet\mvc\nucleo;

use br\univali\sisnet\mvc\nucleo\padroes\Singleton;

class Cabecalho extends Singleton
{
    private $cabecalhos = [];

    public function obterCabecalhoRequisicao($chave)
    {
        $chaveSERVER = str_replace('-', '_', 'HTTP_' . strtoupper($chave));
        return filter_input(INPUT_SERVER, $chaveSERVER);
    }

    public function obterCabecalhoResposta($filtro = null)
    {
        $retorno = [];
        if (is_null($filtro)) {
            foreach ($this->cabecalhos as $k => $v) {
                $retorno[] = $this->obterCabecalhoFormatado($k, $v);
            }
        } else {
            if (isset($this->cabecalhos[$filtro])) {
                if (is_null($this->cabecalhos[$filtro])) {
                    $retorno[] = $this->obterCabecalhoFormatado($filtro, $this->cabecalhos[$filtro]);
                }
            }
        }
        return $retorno;
    }

    private function obterCabecalhoFormatado($chave, $valor)
    {
        return !is_null($valor) ? "{$chave}: ${valor}" : $chave;
    }

    public function adicionarCabecalhoResposta($chave, $valor = null)
    {
        $this->cabecalhos[$chave] = $valor;
    }

}
