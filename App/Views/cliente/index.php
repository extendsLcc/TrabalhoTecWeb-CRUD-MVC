<div class="container">
    <div class="row">
    <br>
    <div class="col-md-12">
        <a href="http://<?php echo APP_HOST; ?>/cliente/cadastro" class="btn btn-success btn-sm">Adicionar</a>
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
            if(!count($viewVar['listaClientes'])){
        ?>
            <div class="alert alert-info" role="alert">Nenhum cliente encontrado</div>
        <?php
            } else {
        ?>
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td class="info">Nome Fantasia</td>
                        <td class="info">Razão Social</td>
                        <td class="info">Tipo Cliente</td>
                        <td class="info">CPF/CNPJ</td>
                        <td class="info">Email</td>
                        <td class="info">Telefone</td>
                        <td class="info">Endereço</td>
                        <td class="info">Cidade</td>
                        <td class="info">Estado</td>
                        <td class="info">CEP</td>
                        <td class="info">status</td>
                        <td class="info">Data de Cadastro</td>
                        <td class="info"></td>
                    </tr>
                    <?php
                        foreach($viewVar['listaClientes'] as $cliente) {
                    ?>
                        <tr>
                            <td><?php echo $cliente->getNomeFantasia(); ?></td>
                            <td><?php echo $cliente->getRazaoSocial(); ?></td>
                            <td><?php echo $cliente->getTipoCliente(); ?></td>
                            <td><?php echo $cliente->getCpfCnpj(); ?></td>
                            <td><?php echo $cliente->getEmail(); ?></td>
                            <td><?php echo $cliente->getTelefone(); ?></td>
                            <td><?php echo $cliente->getEndereco(); ?></td>
                            <td><?php echo $cliente->getCidade(); ?></td>
                            <td><?php echo $cliente->getEstado(); ?></td>
                            <td><?php echo $cliente->getCep(); ?></td>
                            <td><?php echo $cliente->getStatus(); ?></td>
                            <td><?php echo $cliente->getDataCadastro()->format('d/m/Y'); ?></td>
                            <td>
                                <a href="http://<?php echo APP_HOST; ?>/cliente/edicao/<?php echo $cliente->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
                                <a href="http://<?php echo APP_HOST; ?>/cliente/exclusao/<?php echo $cliente->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
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