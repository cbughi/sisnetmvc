<?php

use br\univali\sisnet\mvc\nucleo\Configuracao;
use br\univali\sisnet\mvc\nucleo\GerenciadorRota;
use br\univali\sisnet\mvc\nucleo\Requisicao;

$rotas = new GerenciadorRota();
$rotas->adicionarRota(Requisicao::GET, "", "Padrao", "index");
$rotas->adicionarRota(Requisicao::GET, "/teste", "Padrao", "teste");
$rotas->adicionarRota(Requisicao::POST, "/teste/cadastrar", "Padrao", "cadastrar");
$rotas->adicionarRota(Requisicao::GET, "/restrito/clientes", "Cliente", "listarClientes");

$parametros['db.driver'] = 'pgsql';
$parametros['db.host'] = 'localhost';
$parametros['db.port'] = '5432';
$parametros['db.database'] = 'sisnet';
$parametros['db.username'] = 'postgres';
$parametros['db.password'] = '123456';

$parametros['titulo'] = 'nome do sistema';
$parametros['debug'] = true;

$parametros['template.cache'] = __DIR__ . '/../cache';

$configuracao = Configuracao::getInstance();
$configuracao->rotas($rotas);
$configuracao->parametros($parametros);