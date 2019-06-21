<?php

namespace br\univali\sisnet\mvc\nucleo\ComandLine;

use br\univali\sisnet\mvc\nucleo\Padroes\Singleton;
use splitbrain\phpcli\CLI;

interface ContratoComando
{
    public function executar(CLI $cli);

}
