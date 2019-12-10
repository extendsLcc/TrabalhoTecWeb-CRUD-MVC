<div class="container">
    <div class="row">
    <br>
    <div class="col-md-12">
        <a href="http://<?php echo APP_HOST; ?>/categoriaproduto/cadastro" class="btn btn-success btn-sm">Adicionar</a>
        <hr>
    </div>
    <div class="col-md-12">
        <?php if($Sessao::retornaMensagem()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $Sessao::retornaMensagem(); ?>
            </div>
        <?php } ?>

        <?php
            if(!count($viewVar['listaCategoriasProduto'])){
        ?>
            <div class="alert alert-info" role="alert">Nenhuma Categoria de Produto encontrada</div>
        <?php
            } else {
        ?>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td class="info">Descrição</td>
                        <td class="info">Data Cadastro</td>
                        <td class="info"></td>
                    </tr>
                    <?php
                        foreach($viewVar['listaCategoriasProduto'] as $categoriaProduto) {
                    ?>
                        <tr>
                            <td><?php echo $categoriaProduto->getDescricao(); ?></td>
                            <td><?php echo $categoriaProduto->getDataCadastro()->format('d/m/Y'); ?></td>
                            <td>
                                <a href="http://<?php echo APP_HOST; ?>/categoriaproduto/edicao/<?php echo $categoriaProduto->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
                                <a href="http://<?php echo APP_HOST; ?>/categoriaproduto/exclusao/<?php echo $categoriaProduto->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        <?php
            }
        ?>
    </div>
</div>
</div>