<?php

namespace br\univali\sisnet\mvc\nucleo;

class RespostaMustache extends Resposta
{

    public static $motorMustache;

    private $template;
    private $dados;

    public function __construct($template, $dados)
    {
        $this->template = $template;
        $this->dados = $dados;
    }

    public function executar()
    {
        if (is_null(self::$motorMustache)) {
            throw new \Exception('Motor de template Mustache não foi instalado');
        }
        $tpl = self::$motorMustache->loadTemplate($this->template);
        return $tpl->render($this->dados);
    }

}
