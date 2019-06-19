<?php

namespace App\Controlador;

use br\univali\sisnet\mvc\nucleo\Controlador;
use br\univali\sisnet\mvc\nucleo\RespostaTwig;
use br\univali\sisnet\mvc\nucleo\RespostaMustache;
use br\univali\sisnet\mvc\nucleo\Resposta;
use br\univali\sisnet\mvc\nucleo\Requisicao;

class Padrao extends Controlador
{

    public function index()
    {

        $user = \App\Dominio\Usuario::Create(
            [
                'login' => "ze da silva",
                'nome' => "kshitij206@gmail.com",
                'senha' => password_hash("1234", PASSWORD_BCRYPT)
            ]
        );

        return new Resposta("ola mamae");
    }

    public function teste()
    {

        return new RespostaMustache("cadastro.mustache", array(
                'titulo' => $this->configuracao->obterParametro('titulo')
            )
        );
//      return new RespostaTwig("cadastro.html.twig",array(
//          'titulo' => $this->configuracao->obterConfiguracao('titulo')
//      ));
    }

    public function cadastrar()
    {
        $entidade['nome'] = $this->requisicao->obterParametro("nome", Requisicao::POST);
        $entidade['sobrenome'] = $this->requisicao->obterParametro("sobrenome", Requisicao::POST);
        $entidade['email'] = $this->requisicao->obterParametro("email", Requisicao::POST, FILTER_VALIDATE_EMAIL);
        return new RespostaTwig("detalhe.html.twig", array('registro' => $entidade));
    }
}
