<?php

namespace App\Controlador;

use br\univali\sisnet\mvc\nucleo\Controlador;
use br\univali\sisnet\mvc\nucleo\RespostaTwig;
use br\univali\sisnet\mvc\nucleo\RespostaMustache;
use br\univali\sisnet\mvc\nucleo\Resposta;
use br\univali\sisnet\mvc\nucleo\Requisicao;
use App\Dominio\Produto;

class ProdutoControlador extends Controlador
{

    public function index()
    {

        $produtos = Produto::all();

        return new RespostaMustache("cad-produto.mustache", [
            'produtos' => $produtos
        ]);

    }

    public function teste()
    {

        $produtos = Produto::all();

        return new RespostaMustache("cad-produto.mustache", [
            'produtos' => $produtos
        ]);

    }


}
