<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Cliente;

class ClienteValidador{

    public function validar(Cliente $cliente)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($cliente->getNomeFantasia()))
        {
            $resultadoValidacao->addErro('nomeFantasia',"Nome Fantasia: Este campo não pode ser vazio");
        }

        if(empty($cliente->getRazaoSocial()))
        {
            $resultadoValidacao->addErro('razaoSocial',"Razão Social: Este campo não pode ser vazio");
        }

        if( $cliente->getTipoCliente() != 'Pessoa Fisica' && $cliente->getTipoCliente() != 'Pessoa Juridica' )
        {
            $resultadoValidacao->addErro('tipoCliente',"Tipo Cliente: Este campo não pode ser vazio");
        }

        if(empty($cliente->getCpfCnpj()))
        {
            $resultadoValidacao->addErro('cpfCnpj',"CPF/CNPJ: Este campo não pode ser vazio");
        }

        if(empty($cliente->getEmail()))
        {
            $resultadoValidacao->addErro('email',"Email: Este campo não pode ser vazio");
        }

        if(empty($cliente->getTelefone()))
        {
            $resultadoValidacao->addErro('telefone',"Telefone: Este campo não pode ser vazio");
        }

        if(empty($cliente->getEndereco()))
        {
            $resultadoValidacao->addErro('endereco',"Endereço: Este campo não pode ser vazio");
        }

        if(empty($cliente->getCidade()))
        {
            $resultadoValidacao->addErro('cidade',"Cidade: Este campo não pode ser vazio");
        }

        if(empty($cliente->getEstado()))
        {
            $resultadoValidacao->addErro('estado',"Estado: Este campo não pode ser vazio");
        }

        if(empty($cliente->getCep()))
        {
            $resultadoValidacao->addErro('cep',"CEP: Este campo não pode ser vazio");
        }

        if($cliente->getStatus() != '0' && $cliente->getStatus() != '1')
        {
            $resultadoValidacao->addErro('status',"Status: Este campo não pode ser vazio");
        }
        
        
        return $resultadoValidacao;
    }
}