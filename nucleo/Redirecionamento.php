<?php
namespace br\univali\sisnet\mvc\nucleo;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Redirecionamento
 *
 * @author 1978233
 */
class Redirecionamento extends Resposta{
    
    private $url;
    
    public function __construct($url) {
        $this->url = $url;
    }
    
    public function executar() {
        header("Location: {$this->url}");
        die();    
    }

}
