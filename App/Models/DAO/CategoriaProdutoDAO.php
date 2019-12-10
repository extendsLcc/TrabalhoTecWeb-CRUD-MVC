<?php

namespace App\Models\DAO;

use App\Models\Entidades\CategoriaProduto;

class CategoriaProdutoDAO extends BaseDAO
{
    public function listar($id = null)
    {
        if ($id) {
            $resultado = $this->select(
                "SELECT * FROM categoriaproduto WHERE id = $id"
            );

            return $resultado->fetchObject(CategoriaProduto::class);
        } else {
            $resultado = $this->select(
                'SELECT * FROM categoriaproduto'
            );
            return $resultado->fetchAll(\PDO::FETCH_CLASS, CategoriaProduto::class);
        }

        return false;
    }

    public function salvar(CategoriaProduto $categoriaProduto)
    {
        try {

            $descricao = $categoriaProduto->getDescricao();

            return $this->insert(
                'categoriaproduto',
                ":descricao",
                [
                    ':descricao' => $descricao
                ]
            );

        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados da Categoria Produto.", 500);
        }
    }

    public function atualizar(CategoriaProduto $categoriaProduto)
    {
        try {

            $id = $categoriaProduto->getId();
            $descricao = $categoriaProduto->getDescricao();

            return $this->update(
                'categoriaproduto',
                "descricao = :descricao",
                [
                    ':id' => $id,
                    ':descricao' => $descricao
                ],
                "id = :id"
            );

        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados da Categoria Produto.", 500);
        }
    }

    public function excluir(CategoriaProduto $categoriaProduto)
    {
        try {
            $id = $categoriaProduto->getId();

            return $this->delete('categoriaproduto', $id);

        } catch (Exception $e) {
            throw new \Exception("Erro ao deletar Categoria Produto", 500);
        }
    }
}
