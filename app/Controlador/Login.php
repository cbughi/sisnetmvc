<?php

namespace App\Controlador;

use br\univali\sisnet\mvc\nucleo\Controlador;
use br\univali\sisnet\mvc\nucleo\RespostaTwig;
use br\univali\sisnet\mvc\nucleo\RespostaMustache;
use br\univali\sisnet\mvc\nucleo\Resposta;
use br\univali\sisnet\mvc\nucleo\Requisicao;
use App\Dominio\Usuario;
use br\univali\sisnet\mvc\nucleo\RespostaJson;
use br\univali\sisnet\mvc\nucleo\Redirecionamento;

class Login extends Controlador
{

    public function index()
    {

        //        CADASTRA USUÁRIO DE TESTE
        //        $usuario = Usuario::insert(
        //            [
        //                'login' => "admin",
        //                'nome' => "Admin",
        //                'senha' => password_hash("admin", PASSWORD_BCRYPT)
        //            ]
        //        );

        if (!empty($_SESSION['usuario']['login'])) {

            return new Redirecionamento("/cad-produto");

//            return new RespostaJson('usuario ja esta logado');
        }

        $configuracaoMustache = [
            'titulo' => $this->configuracao->obterParametro('titulo')
        ];

        return new RespostaMustache("login.mustache", $configuracaoMustache);
    }

    public function entrar()
    {

        $form = [];
        $form['login'] = $this->requisicao->obterParametro("login", Requisicao::POST);
        $form['senha'] = $this->requisicao->obterParametro("senha", Requisicao::POST);

        $usuario = Usuario::where('login', '=', $form['login'])->first();

        if (password_verify($form['senha'], $usuario->senha)) {

            $_SESSION['usuario']['nome'] = $usuario->nome;
            $_SESSION['usuario']['login'] = $usuario->login;

            return new Redirecionamento("/cad-produto");

        } else {
            return new RespostaJson('login incorreto');
        }

    }

    public function sair()
    {
        session_destroy();
        return new Redirecionamento("/");
    }

}
