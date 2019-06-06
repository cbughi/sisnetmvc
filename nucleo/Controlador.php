<?php
namespace br\univali\sisnet\mvc\nucleo;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controlador
 *
 * @author 1978233
 */
class Controlador {
    
    /**
     * @var Requisicao 
     */
    protected $requisicao;
    /**
     * @var Configuracao configuracao 
     */
    protected $configuracao;
    
    public function __construct(Requisicao $requisicao) {
        $this->configuracao = Configuracao::getInstance();
        
        if ($requisicao instanceof Requisicao){
            $this->requisicao = $requisicao;
        }
    }
    
    
}
