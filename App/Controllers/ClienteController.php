<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ClienteDAO;
use App\Models\Entidades\Cliente;
use App\Models\Validacao\ClienteValidador;

class ClienteController extends Controller
{
    //Dentro de um Controller, cada método público é em geral uma ação
    public function index()
    {
        $clienteDAO = new ClienteDAO();

        self::setViewParam('listaClientes', $clienteDAO->listar());

        $this->render('/cliente/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('/cliente/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $cliente = new Cliente();
        $cliente->setNomeFantasia($_POST['nomeFantasia']);
        $cliente->setRazaoSocial($_POST['razaoSocial']);
        $cliente->setTipoCliente($_POST['tipoCliente']);
        $cliente->setCpfCnpj($_POST['cpfCnpj']);
        $cliente->setEmail($_POST['email']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->setEndereco($_POST['endereco']);
        $cliente->setCidade($_POST['cidade']);
        $cliente->setEstado($_POST['estado']);
        $cliente->setCep($_POST['cep']);
        $cliente->setStatus($_POST['status']);


        Sessao::gravaFormulario($_POST);

        $clienteValidador = new ClienteValidador();
        $resultadoValidacao = $clienteValidador->validar($cliente);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/cliente/cadastro');
        }

        $clienteDAO = new ClienteDAO();

        $clienteDAO->salvar($cliente);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/cliente');
    }

    public function edicao($params)
    {
        $id = $params[0];

        $clienteDAO = new ClienteDAO();

        $cliente = $clienteDAO->listar($id);

        if (!$cliente) {
            Sessao::gravaMensagem("Cliente inexistente");
            $this->redirect('/cliente');
        }

        self::setViewParam('cliente', $cliente);

        $this->render('/cliente/editar');

        Sessao::limpaMensagem();
    }

    public function atualizar()
    {
        $cliente = new Cliente();
        $cliente->setId($_POST['id']);
        $cliente->setNomeFantasia($_POST['nomeFantasia']);
        $cliente->setRazaoSocial($_POST['razaoSocial']);
        $cliente->setTipoCliente($_POST['tipoCliente']);
        $cliente->setCpfCnpj($_POST['cpfCnpj']);
        $cliente->setEmail($_POST['email']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->setEndereco($_POST['endereco']);
        $cliente->setCidade($_POST['cidade']);
        $cliente->setEstado($_POST['estado']);
        $cliente->setCep($_POST['cep']);
        $cliente->setStatus($_POST['status']);

        Sessao::gravaFormulario($_POST);

        $clienteValidador = new ClienteValidador();
        $resultadoValidacao = $clienteValidador->validar($cliente);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/cliente/edicao/' . $_POST['id']);
        }

        $clienteDAO = new ClienteDAO();

        $clienteDAO->atualizar($cliente);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/cliente');
    }

    public function exclusao($params)
    {
        $id = $params[0];

        $clienteDAO = new ClienteDAO();

        $cliente = $clienteDAO->listar($id);

        if (!$cliente) {
            Sessao::gravaMensagem("Cliente inexistente");
            $this->redirect('/cliente');
        }

        self::setViewParam('cliente', $cliente);

        $this->render('/cliente/exclusao');

        Sessao::limpaMensagem();
    }

    public function excluir()
    {
        $cliente = new Cliente();
        $cliente->setId($_POST['id']);

        $clienteDAO = new ClienteDAO();

        if (!$clienteDAO->excluir($cliente)) {
            Sessao::gravaMensagem("Cliente inexistente");
            $this->redirect('/cliente');
        }

        Sessao::gravaMensagem("Cliente excluído com sucesso!");

        $this->redirect('/cliente');
    }
}
