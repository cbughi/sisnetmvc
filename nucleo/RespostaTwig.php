<?php

namespace br\univali\sisnet\mvc\nucleo;

class RespostaTwig extends Resposta
{

    public static $motorTwig;

    private $template;
    private $dados;

    public function __construct($template, $dados)
    {
        $this->template = $template;
        $this->dados = $dados;
    }

    public function executar()
    {
        if (is_null(self::$motorTwig)) {
            throw new \Exception('Motor de template Twig não foi instalado');
        }
        return self::$motorTwig->render($this->template, $this->dados);
    }

}
