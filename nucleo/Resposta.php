<?php

namespace br\univali\sisnet\mvc\nucleo;

use br\univali\sisnet\mvc\nucleo\Cabecalho;

class Resposta
{

    private $conteudo;
    private $status;
    private $mensagem;

    public function __construct(string $conteudo = '', int $status = 200, string $mensagem = "OK")
    {
        $this->conteudo = $conteudo;
        $this->status = $status;
        $this->mensagem = $mensagem;
    }

    public function executar()
    {
        $cabecalho = Cabecalho::getInstance();
        $cabecalho->adicionarCabecalhoResposta("HTTP/1.1 {$this->status} {$this->mensagem}");

        if ($this->status == 200) {
            return $this->conteudo;
        }
    }

}
