<?php
namespace br\univali\sisnet\mvc\nucleo;

use mysql_xdevapi\Exception;

/**
 * Description of RespostaTwig
 *
 * @author 1978233
 */
class RespostaMustache extends Resposta {
    
    public static $motorMustache;
    
    private $template;
    private $dados;
    
    public function __construct($template,$dados) {
        $this->template = $template;
        $this->dados = $dados;
    }

    public function executar() {
        if (is_null(self::$motorMustache)){
            throw new \Exception('Motor de template Mustache não foi instalado');
        }
        $tpl = self::$motorMustache->loadTemplate($this->template);
        return $tpl->render($this->dados);
    }

}
