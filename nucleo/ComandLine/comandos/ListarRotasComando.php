<?php

namespace br\univali\sisnet\mvc\nucleo\ComandLine\comandos;

use br\univali\sisnet\mvc\nucleo\ComandLine\ContratoComando;
use splitbrain\phpcli\CLI;
use \br\univali\sisnet\mvc\nucleo\Configuracao;

class ListarRotasComando implements ContratoComando
{

    private $configuracao;

    public $parametroCurto = 'r';
    public $descricao = 'Lista as rotas do sistema';
    public $parametroLongo = 'listarRotas';

    public function executar(CLI $cli)
    {

        $this->configuracao = Configuracao::getInstance();
        $cli->notice(str_pad('URL', 40, " ", STR_PAD_RIGHT) . " | " . str_pad('METODO', 15, " ", STR_PAD_RIGHT) . " | " . str_pad('CONTROLADOR', 15, " ", STR_PAD_RIGHT) . " | " . str_pad('AÇÃO', 15, " ", STR_PAD_RIGHT));

        foreach ($this->configuracao->listarRotar() as $rota) {

            $url = str_pad($rota['url'], 40, " ", STR_PAD_RIGHT);
            $metodo = str_pad($rota['metodo'], 15, " ", STR_PAD_RIGHT);
            $controlador = str_pad($rota['controlador'], 15, " ", STR_PAD_RIGHT);
            $acao = str_pad($rota['acao'], 15, " ", STR_PAD_RIGHT);

            $cli->notice($url . " | " . $metodo . " | " . $controlador . " | " . $acao);

        }

    }

}
