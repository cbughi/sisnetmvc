<?php

namespace br\univali\sisnet\mvc\nucleo\ComandLine\comandos;

use br\univali\sisnet\mvc\nucleo\ComandLine\ContratoComando;
use splitbrain\phpcli\CLI;

class VersaoComando implements ContratoComando
{

    public $parametroCurto = 'v';
    public $descricao = 'Exibe a versão do sistema';
    public $parametroLongo = 'versao';

    public function executar(CLI $cli)
    {
        $cli->info('1.0.0');
    }

}
