<?php

namespace Bin;

require __DIR__ . '/../vendor/autoload.php';
require_once('./../app/config.php');

use splitbrain\phpcli\CLI;
use splitbrain\phpcli\Colors;
use splitbrain\phpcli\Options;

use \br\univali\sisnet\mvc\nucleo\Configuracao;

class BughiConfig extends CLI
{

    private $configuracao;

    protected function registerDefaultOptions()
    {
        $this->options->registerOption(
            'ajuda',
            'Ajudas do Bughi',
            'a'
        );
    }

    protected function setup(Options $options)
    {

        $this->configuracao = Configuracao::getInstance();
        $options->setHelp("Command Line - Ajudas do Bughi

  _________ _________    ___ ______                 __ __ ____  ____ __ __  ____ _     ____ 
 / ___/    / ___/    \  /  _]      |               |  |  |    \|    |  |  |/    | |   |    |
(   \_ |  (   \_|  _  |/  [_|      |     _____     |  |  |  _  ||  ||  |  |  o  | |    |  | 
 \__  ||  |\__  |  |  |    _]_|  |_|    |     |    |  |  |  |  ||  ||  |  |     | |___ |  | 
 /  \ ||  |/  \ |  |  |   [_  |  |      |_____|    |  :  |  |  ||  ||  :  |  _  |     ||  | 
 \    ||  |\    |  |  |     | |  |                 |     |  |  ||  | \   /|  |  |     ||  | 
  \___|____|\___|__|__|_____| |__|                  \__,_|__|__|____| \_/ |__|__|_____|____|
                                                                                            
        
        \n - Douglas Duarte \n - Cauê \n - Keony \n - Cristian \n - Paulo");

        $options->registerOption('versao', 'mostra versão', 'v');
        $options->registerOption('criarControlador', 'Cria um novo controlador', 'c');
        $options->registerOption('mostrarRotas', 'Mostrar rotas do sistema', 'r');

    }

    protected function main(Options $options)
    {

        if ($options->getOpt('versao')) {

            $this->info('1.0.0');

        } elseif ($options->getOpt('mostrarRotas')) {

            $this->notice(str_pad('URL', 40, " ", STR_PAD_RIGHT) . " | " . str_pad('METODO', 15, " ", STR_PAD_RIGHT) . " | " . str_pad('CONTROLADOR', 15, " ", STR_PAD_RIGHT) . " | " . str_pad('AÇÃO', 15, " ", STR_PAD_RIGHT));
            foreach ($this->configuracao->listarRotar() as $rota) {

                $url = str_pad($rota['url'], 40, " ", STR_PAD_RIGHT);
                $metodo = str_pad($rota['metodo'], 15, " ", STR_PAD_RIGHT);
                $controlador = str_pad($rota['controlador'], 15, " ", STR_PAD_RIGHT);
                $acao = str_pad($rota['acao'], 15, " ", STR_PAD_RIGHT);

                $this->notice($url . " | " . $metodo . " | " . $controlador . " | " . $acao);

            }

        } else {
            echo $options->help();
        }

    }
}

$cli = new BughiConfig();
$cli->run();