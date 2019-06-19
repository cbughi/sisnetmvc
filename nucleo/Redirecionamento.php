<?php

namespace br\univali\sisnet\mvc\nucleo;

class Redirecionamento extends Resposta
{

    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function executar()
    {
        header("Location: {$this->url}");
        die();
    }

}
