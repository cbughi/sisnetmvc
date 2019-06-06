<?php
namespace br\univali\sisnet\mvc\nucleo;

use br\univali\sisnet\mvc\nucleo\Cabecalho;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Resposta
 *
 * @author 1978233
 */
class Resposta {
    
    private $conteudo;
    private $status;
    private $mensagem;
    
    public function __construct(string $conteudo = '', int $status = 200, string $mensagem = "OK") {
        $this->conteudo = $conteudo;
        $this->status = $status;
        $this->mensagem = $mensagem;
    }
    
    public function executar(){
        $cabecalho = Cabecalho::getInstance();
        $cabecalho->adicionarCabecalhoResposta("HTTP/1.1 {$this->status} {$this->mensagem}");

        if ($this->status == 200){
            return $this->conteudo;
        }
    }
    
}
