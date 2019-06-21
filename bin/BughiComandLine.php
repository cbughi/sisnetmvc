<?php

namespace Bin;

require __DIR__ . '/../vendor/autoload.php';
require_once(__DIR__ . './../app/config.php');

use br\univali\sisnet\mvc\nucleo\ComandLine\ContratoComando;
use splitbrain\phpcli\CLI;
use splitbrain\phpcli\Colors;
use splitbrain\phpcli\Options;

use \br\univali\sisnet\mvc\nucleo\Configuracao;

use br\univali\sisnet\mvc\nucleo\ComandLine\comandos\VersaoComando;
use br\univali\sisnet\mvc\nucleo\ComandLine\comandos\ListarRotasComando;

class BughiComandLine extends CLI
{

    private $configuracao;
    private $comandos;

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

        $this->configuracao->adicionarComando(new VersaoComando());
        $this->configuracao->adicionarComando(new ListarRotasComando());

        $this->comandos = $this->configuracao->obterComandos();

        foreach ($this->comandos as $key => $value) {
            $options->registerOption($key, $value['descricao'], $value['parametroCurto']);
        }

    }

    protected function main(Options $options)
    {

        $opcoesSelecionadas = $options->getOpt();

        if (empty($opcoesSelecionadas) || isset($opcoesSelecionadas['ajuda'])) {
            echo $options->help();
            exit;
        }

        foreach ($opcoesSelecionadas as $key => $value) {
            $this->comandos[$key]['comando']->executar($this);
        }

    }

}

$cli = new BughiComandLine();
$cli->run();