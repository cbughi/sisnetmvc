<?php

namespace br\univali\sisnet\mvc\nucleo;

use br\univali\sisnet\mvc\nucleo\ComandLine\ContratoComando;
use br\univali\sisnet\mvc\nucleo\Padroes\Singleton;
use br\univali\sisnet\mvc\nucleo\ComandLine\TraitConfiguracaoComando;
use br\univali\sisnet\mvc\nucleo\Rota\TraitRota;
use br\univali\sisnet\mvc\nucleo\filtro\TraitFiltro;

class Configuracao extends Singleton
{

    use TraitConfiguracaoComando;
    use TraitRota;
    use TraitFiltro;

}