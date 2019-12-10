<?php

namespace App\Models\Entidades;

use DateTime;

class CategoriaProduto
{
    private $id;
    private $descricao;
    private $dataCadastro;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDataCadastro()
    {
        return new DateTime($this->dataCadastro);
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }

}