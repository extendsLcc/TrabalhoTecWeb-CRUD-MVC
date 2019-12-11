<?php

namespace App\Models\DAO;

use App\Models\Entidades\Cliente;

class ClienteDAO extends BaseDAO
{
    public function listar($id = null)
    {
        if ($id) {
            $resultado = $this->select(
                "SELECT * FROM cliente WHERE id = $id"
            );

            return $resultado->fetchObject(Cliente::class);
        } else {
            $resultado = $this->select(
                'SELECT * FROM cliente'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Cliente::class);
        }

        return false;
    }

    public function salvar(Cliente $cliente)
    {
        try {

            $nomeFantasia = $cliente->getNomeFantasia();
            $razaoSocial = $cliente->getRazaoSocial();
            $tipoCliente = $cliente->getTipoCliente();
            $cpfCnpj = $cliente->getCpfCnpj();
            $email = $cliente->getEmail();
            $telefone = $cliente->getTelefone();
            $endereco = $cliente->getEndereco();
            $cidade = $cliente->getCidade();
            $estado = $cliente->getEstado();
            $cep = $cliente->getCep();
            $status = $cliente->getStatus();

            return $this->insert(
                'cliente',
                ":nomeFantasia,:razaoSocial,:tipoCliente,:cpfCnpj,:email,:telefone,:endereco,:cidade,:estado,:cep, :status",
                [
                    ':nomeFantasia' => $nomeFantasia,
                    ':razaoSocial' => $razaoSocial,
                    ':tipoCliente' => $tipoCliente,
                    ':cpfCnpj' => $cpfCnpj,
                    ':email' => $email,
                    ':telefone' => $telefone,
                    ':endereco' => $endereco,
                    ':cidade' => $cidade,
                    ':estado' => $estado,
                    ':cep' => $cep,
                    ':status' => $status
                ]
            );

        } catch (\Exception $e) {
            print_r( $e );
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function atualizar(Cliente $cliente)
    {
        try {

            $id = $cliente->getId();
            $nomeFantasia = $cliente->getNomeFantasia();
            $razaoSocial = $cliente->getRazaoSocial();
            $tipoCliente = $cliente->getTipoCliente();
            $cpfCnpj = $cliente->getCpfCnpj();
            $email = $cliente->getEmail();
            $telefone = $cliente->getTelefone();
            $endereco = $cliente->getEndereco();
            $cidade = $cliente->getCidade();
            $estado = $cliente->getEstado();
            $cep = $cliente->getCep();
            $status = $cliente->getStatus();

            return $this->update(
                'cliente',
                "nomeFantasia = :nomeFantasia, razaoSocial = :razaoSocial, tipoCliente = :tipoCliente,
                cpfCnpj = :cpfCnpj, email = :email, telefone = :telefone, endereco = :endereco, cidade = :cidade
                , estado = :estado, cep = :cep, status = :status",
                [
                    ':id' => $id,
                    ':nomeFantasia' => $nomeFantasia,
                    ':razaoSocial' => $razaoSocial,
                    ':tipoCliente' => $tipoCliente,
                    ':cpfCnpj' => $cpfCnpj,
                    ':email' => $email,
                    ':telefone' => $telefone,
                    ':endereco' => $endereco,
                    ':cidade' => $cidade,
                    ':estado' => $estado,
                    ':cep' => $cep,
                    ':status' => $status
                ],
                "id = :id"
            );

        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Cliente $cliente)
    {
        try {
            $id = $cliente->getId();

            return $this->delete('cliente', $id);

        } catch (Exception $e) {
            throw new \Exception("Erro ao deletar", 500);
        }
    }
}
