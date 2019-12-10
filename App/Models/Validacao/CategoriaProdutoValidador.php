<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\CategoriaProduto;

class CategoriaProdutoValidador{

    public function validar(CategoriaProduto $categoriaProduto)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($categoriaProduto->getDescricao()))
        {
            $resultadoValidacao->addErro('descricao',"Descrição: Este campo não pode ser vazio");
        }

        return $resultadoValidacao;
    }
}