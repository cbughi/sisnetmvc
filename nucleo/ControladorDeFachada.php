<?php

namespace br\univali\sisnet\mvc\nucleo;

use br\univali\sisnet\mvc\nucleo\Cabecalho;

class ControladorDeFachada
{
    /**
     * @var Configuracao $configuracao
     */
    private $configuracao;

    public function __construct()
    {
        $this->configuracao = Configuracao::getInstance();

    }

    public function processaRequisicao()
    {
        $requisicao = new Requisicao();

        $link = filter_input(INPUT_SERVER, 'REQUEST_URI');

        $temp = explode("index.php", $link);

        if (!empty($temp[1])) {
            $temp = explode("?", $temp[1]);
        }

        $rota = $temp[0];
        $metodo = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

        $acao = $this->configuracao->buscarRota($rota, $metodo);


        $filtroInicial = $this->configuracao->obterConfiguradorFiltro()->buscarFiltro($rota,$metodo);

        if ($filtroInicial != null){
            $filtroInicial->filtrar($requisicao);
        }

        $classeControlador = "\\App\\Controlador\\" . $acao['controlador'];
        $metodoAcao = $acao['acao'];

        $controlador = new $classeControlador($requisicao);

        if ($controlador instanceof Controlador) {

            $retorno = call_user_func_array(array($controlador, $metodoAcao), array());

            if (!$retorno instanceof Resposta) {
                throw new \Exception("Ação inválida: {$acao['acao']}");
            }

            $conteudo = $retorno->executar();

            $cabecalhos = Cabecalho::getInstance()->obterCabecalhoResposta();

            foreach ($cabecalhos as $cabecalho) {
                header($cabecalho);
            }
            echo $conteudo;

        } else {

            throw new \Exception("Controlador inválido: {$acao['controlador']}");

        }
    }

}
