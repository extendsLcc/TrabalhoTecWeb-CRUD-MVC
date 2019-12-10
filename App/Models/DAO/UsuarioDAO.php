<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;

class UsuarioDAO extends BaseDAO
{
    public function listar($id = null)
    {
        if ($id) {
            $resultado = $this->select(
                "SELECT * FROM usuario WHERE id = $id"
            );

            return $resultado->fetchObject(Usuario::class);
        } else {
            $resultado = $this->select(
                'SELECT * FROM usuario'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, Usuario::class);
        }

        return false;
    }

    public function salvar(Usuario $usuario)
    {
        try {

            $nome = $usuario->getNome();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();

            return $this->insert(
                'usuario',
                ":nome,:email,:senha",
                [
                    ':nome' => $nome,
                    ':email' => $email,
                    ':senha' => $senha,
                ]
            );

        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function atualizar(Usuario $usuario)
    {
        try {

            $id = $usuario->getId();
            $nome = $usuario->getNome();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();

            return $this->update(
                'usuario',
                "nome = :nome, email = :email, senha = :senha",
                [
                    ':id' => $id,
                    ':nome' => $nome,
                    ':email' => $email,
                    ':senha' => $senha,
                ],
                "id = :id"
            );

        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function excluir(Usuario $usuario)
    {
        try {
            $id = $usuario->getId();

            return $this->delete('usuario', $id);

        } catch (Exception $e) {
            throw new \Exception("Erro ao deletar", 500);
        }
    }
}
