<div class="container">
    <div class="row">
    <br>
    <div class="col-md-12">
        <a href="http://<?php echo APP_HOST; ?>/usuario/cadastro" class="btn btn-success btn-sm">Adicionar</a>
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
            if(!count($viewVar['listaUsuarios'])){
        ?>
            <div class="alert alert-info" role="alert">Nenhum usuario encontrado</div>
        <?php
            } else {
        ?>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td class="info">Nome</td>
                        <td class="info">email</td>
                        <td class="info">senha</td>
                        <td class="info">Data Cadastro</td>
                        <td class="info"></td>
                    </tr>
                    <?php
                        foreach($viewVar['listaUsuarios'] as $usuario) {
                    ?>
                        <tr>
                            <td><?php echo $usuario->getNome(); ?></td>
                            <td><?php echo $usuario->getEmail(); ?></td>
                            <td><?php echo $usuario->getSenha(); ?></td>
                            <td><?php echo $usuario->getDataCadastro()->format('d/m/Y'); ?></td>
                            <td>
                                <a href="http://<?php echo APP_HOST; ?>/usuario/edicao/<?php echo $usuario->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
                                <a href="http://<?php echo APP_HOST; ?>/usuario/exclusao/<?php echo $usuario->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
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