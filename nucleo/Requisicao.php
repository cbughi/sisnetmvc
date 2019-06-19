<?php

namespace br\univali\sisnet\mvc\nucleo;

class Requisicao
{

    const GET = "GET";
    const POST = "POST";
    const PUT = "PUT";
    const DELETE = "DELETE";

    public function __construct()
    {

    }

    public function obterParametro(string $chave, string $metodo = self::GET, int $filtro = FILTER_DEFAULT)
    {
        switch ($metodo) {
            case Requisicao::GET:
                $tipo = INPUT_GET;
                break;
            case Requisicao::POST:
            case Requisicao::DELETE:
            case Requisicao::PUT:
            default:
                $tipo = INPUT_POST;
                break;
        }
        $parametro = filter_input($tipo, $chave, $filtro) ?? null;
        return $parametro;
    }

    public function get($chave, int $filtro = FILTER_DEFAULT)
    {
        return $this->obterParametro($chave, Requisicao::GET, $filtro);
    }

    public function post($chave, int $filtro = FILTER_DEFAULT)
    {
        return $this->obterParametro($chave, Requisicao::POST, $filtro);
    }

}
