<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UsuarioDAO;
use App\Models\Entidades\Usuario;
use App\Models\Validacao\UsuarioValidador;

class UsuarioController extends Controller
{
    //Dentro de um Controller, cada método público é em geral uma ação
    public function index()
    {
        $usuarioDAO = new UsuarioDAO();

        self::setViewParam('listaUsuarios', $usuarioDAO->listar());

        $this->render('/usuario/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('/usuario/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $usuario = new Usuario();
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);

        Sessao::gravaFormulario($_POST);

        $usuarioValidador = new UsuarioValidador();
        $resultadoValidacao = $usuarioValidador->validar($usuario);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/usuario/cadastro');
        }

        $usuarioDAO = new UsuarioDAO();

        $usuarioDAO->salvar($usuario);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/usuario');
    }

    public function edicao($params)
    {
        $id = $params[0];

        $usuarioDAO = new UsuarioDAO();

        $usuario = $usuarioDAO->listar($id);

        if (!$usuario) {
            Sessao::gravaMensagem("Usuario inexistente");
            $this->redirect('/usuario');
        }

        self::setViewParam('usuario', $usuario);

        $this->render('/usuario/editar');

        Sessao::limpaMensagem();
    }

    public function atualizar()
    {
        $usuario = new Usuario();
        $usuario->setId($_POST['id']);
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);

        Sessao::gravaFormulario($_POST);

        $usuarioValidador = new UsuarioValidador();
        $resultadoValidacao = $usuarioValidador->validar($usuario);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/usuario/edicao/' . $_POST['id']);
        }

        $usuarioDAO = new UsuarioDAO();

        $usuarioDAO->atualizar($usuario);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/usuario');
    }

    public function exclusao($params)
    {
        $id = $params[0];

        $usuarioDAO = new UsuarioDAO();

        $usuario = $usuarioDAO->listar($id);

        if (!$usuario) {
            Sessao::gravaMensagem("Usuario inexistente");
            $this->redirect('/usuario');
        }

        self::setViewParam('usuario', $usuario);

        $this->render('/usuario/exclusao');

        Sessao::limpaMensagem();
    }

    public function excluir()
    {
        $usuario = new Usuario();
        $usuario->setId($_POST['id']);

        $usuarioDAO = new UsuarioDAO();

        if (!$usuarioDAO->excluir($usuario)) {
            Sessao::gravaMensagem("Usuario inexistente");
            $this->redirect('/usuario');
        }

        Sessao::gravaMensagem("Usuario excluído com sucesso!");

        $this->redirect('/usuario');
    }
}
