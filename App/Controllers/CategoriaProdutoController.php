<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\CategoriaProdutoDAO;
use App\Models\Entidades\CategoriaProduto;
use App\Models\Validacao\CategoriaProdutoValidador;

class CategoriaProdutoController extends Controller
{
    //Dentro de um Controller, cada método público é em geral uma ação
    public function index()
    {
        $categoriaProdutoDAO = new CategoriaProdutoDAO();

        self::setViewParam('listaCategoriasProduto', $categoriaProdutoDAO->listar());

        $this->render('/categoriaproduto/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('/categoriaproduto/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $categoriaProduto = new CategoriaProduto();
        $categoriaProduto->setDescricao($_POST['descricao']);

        Sessao::gravaFormulario($_POST);

        $categoriaProdutoValidador = new CategoriaProdutoValidador();
        $resultadoValidacao = $categoriaProdutoValidador->validar($categoriaProduto);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/categoriaproduto/cadastro');
        }

        $categoriaProdutoDAO = new CategoriaProdutoDAO();

        $categoriaProdutoDAO->salvar($categoriaProduto);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/categoriaproduto');
    }

    public function edicao($params)
    {
        $id = $params[0];

        $categoriaProdutoDAO = new CategoriaProdutoDAO();

        $categoriaProduto = $categoriaProdutoDAO->listar($id);

        if (!$categoriaProduto) {
            Sessao::gravaMensagem("Categoria de Produto inexistente");
            $this->redirect('/categoriaProduto');
        }

        self::setViewParam('categoriaProduto', $categoriaProduto);

        $this->render('/categoriaproduto/editar');

        Sessao::limpaMensagem();
    }

    public function atualizar()
    {
        $categoriaProduto = new CategoriaProduto();
        $categoriaProduto->setId($_POST['id']);
        $categoriaProduto->setDescricao($_POST['descricao']);

        print_r($_POST);
//        die();
        Sessao::gravaFormulario($_POST);

        $categoriaProdutoValidador = new CategoriaProdutoValidador();
        $resultadoValidacao = $categoriaProdutoValidador->validar($categoriaProduto);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/categoriaproduto/edicao/' . $_POST['id']);
        }

        $categoriaProdutoDAO = new CategoriaProdutoDAO();

        $categoriaProdutoDAO->atualizar($categoriaProduto);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/categoriaproduto');
    }

    public function exclusao($params)
    {
        $id = $params[0];

        $categoriaProdutoDAO = new CategoriaProdutoDAO();

        $categoriaProduto = $categoriaProdutoDAO->listar($id);

        if (!$categoriaProduto) {
            Sessao::gravaMensagem("Categoria de Produto inexistente");
            $this->redirect('/categoriaproduto');
        }

        self::setViewParam('categoriaProduto', $categoriaProduto);

        $this->render('/categoriaproduto/exclusao');

        Sessao::limpaMensagem();
    }

    public function excluir()
    {
        $categoriaProduto = new CategoriaProduto();
        $categoriaProduto->setId($_POST['id']);

        $categoriaProdutoDAO = new CategoriaProdutoDAO();

        if (!$categoriaProdutoDAO->excluir($categoriaProduto)) {
            Sessao::gravaMensagem("Categoria de Produto inexistente");
            $this->redirect('/categoriaproduto');
        }

        Sessao::gravaMensagem("Categoria de Produto excluído com sucesso!");

        $this->redirect('/categoriaproduto');
    }
}
