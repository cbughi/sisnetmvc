<?php

require __DIR__ . '/../vendor/autoload.php';

use splitbrain\phpcli\CLI;
use splitbrain\phpcli\Colors;
use splitbrain\phpcli\Options;

use ObterRotasComando;

class BughiConfig extends CLI
{

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

        $options->setHelp("Command Line - Ajudas do Bughi
                                                   
                                                   
                 (#%%%%&%%%%#                      
               (##&%%&%&&&&&&%#(                   
              #(%%##(#%%&%###%%##                  
             ##/////////////////%%                 
            #%//////////////////*%                 
            %%//////*/////**////*(%                
            &(////////(((((////**/%                
            %(%#%%%%%##(###%&%%%%/(                
           (((#&(%&%&%///#%%%&(%%(*                
            ((/(#####(////(##%%#(//                
            %(((((((((*////((((((/%                
            %((((((#/((((//%#(((/(%                
            ##((((#//%&%&%((##(((#                 
            /&%###%#%&%&&&%%#(###%                 
             %&&%&&%%%######%%%%%,                 
            /&&&&&%####%%#(##%&&&,                 
       ..,*/%%#&@&&%((#&%((%%&&%*,                 
      /****(#%##%&&&&%#%##&&&#(*,,.              
 .,..*/////(#%####%&&@&@&&&&%%%%(***,...../.       
......///(((##%####%%%%%&&%%%*.%%**/...      ..    
......*//////.,##%%%%%%%%%&&(%%&///*..,/*****,/*,,.
/(((///##%%%#(&&%%(%%%%%%%((#%%%///*/***********,,,
///////((((#(((#%%%%%##%((%####(*//*/***((/*******,
        
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



        } else {
            echo $options->help();
        }

    }
}

$cli = new BughiConfig();
$cli->run();