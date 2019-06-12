<?php
require __DIR__ . '/../vendor/autoload.php';

use splitbrain\phpcli\CLI;
use splitbrain\phpcli\Colors;
use splitbrain\phpcli\Options;

class Bughi extends CLI
{

    protected function registerDefaultOptions()
    {
        $this->options->registerOption(
            'ajuda',
            'Ajudas do Bughi',
            'h'
        );
    }

    protected function setup(Options $options)
    {
        $options->setHelp("Command Line - Ajudas do Bughi \n - Douglas Duarte \n - Cauê \n - Keony \n - Cristian \n - Paulo");
        $options->registerOption('versao', 'mostra versão', 'v');
        $options->registerOption('criarControlador', 'Cria um novo controlador', 'c');
    }

    protected function main(Options $options)
    {
        if ($options->getOpt('versao')) {
            $this->info('1.0.0');
        } else {
            echo $options->help();
        }
    }
}

// execute it
$cli = new Bughi();
$cli->run();