<?php

use br\univali\sisnet\mvc\nucleo\Configuracao;
use br\univali\sisnet\mvc\nucleo\GerenciadorRota;
use br\univali\sisnet\mvc\nucleo\Requisicao;
use br\univali\sisnet\mvc\nucleo\ConfiguradorFiltro;

$configurador = new ConfiguradorFiltro();
$configurador->adicionarFiltro('GET','/teste','App\Controlador\FiltroTeste1');
$configurador->adicionarFiltro('GET','/teste','App\Controlador\FiltroTeste2');
$configurador->adicionarFiltro('GET','/teste','App\Controlador\FiltroTeste1');

$rotas = new GerenciadorRota();
$rotas->adicionarRota(Requisicao::GET, "", "Padrao", "index");
$rotas->adicionarRota(Requisicao::GET, "/teste", "Padrao", "index");
$rotas->adicionarRota(Requisicao::POST, "/teste/cadastrar", "Padrao", "cadastrar");
$rotas->adicionarRota(Requisicao::GET, "/restrito/clientes", "Cliente", "listarClientes");

//Rotas de login
$rotas->adicionarRota(Requisicao::GET, "/auth", "Login", "index");
$rotas->adicionarRota(Requisicao::POST, "/auth", "Login", "entrar");
$rotas->adicionarRota(Requisicao::GET, "/auth/sair", "Login", "sair");

$parametros['db.driver'] = 'pgsql';
$parametros['db.host'] = 'localhost';
$parametros['db.port'] = '5432';
$parametros['db.database'] = 'sisnetmvc';
$parametros['db.username'] = 'postgres';
$parametros['db.password'] = '123456';

$parametros['titulo'] = 'nome do sistema';
$parametros['debug'] = true;

$parametros['template.cache'] = __DIR__ . '/../cache';

/** @var Configuracao $configuracao */
$configuracao = Configuracao::getInstance();
$configuracao->rotas($rotas);
$configuracao->parametros($parametros);
$configuracao->filtros($configurador);

