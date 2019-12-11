<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Editar cliente</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/cliente/atualizar" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['cliente']->getId(); ?>">

                <div class="form-group">
                    <label for="nome">Nome Fantasia</label>
                    <input type="text" class="form-control"  name="nomeFantasia" placeholder="Nome do Cliente" value="<?php echo $viewVar['cliente']->getNomeFantasia(); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="nome">Razão Social</label>
                    <input type="text" class="form-control"  name="razaoSocial" placeholder="Razão Social" value="<?php echo $viewVar['cliente']->getRazaoSocial(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="tipoCliente">Tipo Cliente</label>
                    <select name="tipoCliente" id="tipoCliente">
                        <option value="Pessoa Fisica" <?php if( $viewVar['cliente']->getTipoCliente() == "Pessoa Fisica") { ?> selected <?php } ?> >Pessoa Física</option>
                        <option value="Pessoa Juridica"<?php if(  $viewVar['cliente']->getTipoCliente() == "Pessoa Juridica") { ?> selected <?php } ?> >Pessoa Juridica</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nome">CPF/CPNJ</label>
                    <input type="text" class="form-control"  name="cpfCnpj" placeholder="CPF/CPNJ" value="<?php echo $viewVar['cliente']->getCpfCnpj(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="nome">Email</label>
                    <input type="email" class="form-control"  name="email" placeholder="Email" value="<?php echo $viewVar['cliente']->getEmail(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="nome">Telefone</label>
                    <input type="text" class="form-control"  name="telefone" placeholder="Telefone" value="<?php echo $viewVar['cliente']->getTelefone(); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="nome">Endereço</label>
                    <input type="text" class="form-control"  name="endereco" placeholder="Endereço" value="<?php echo $viewVar['cliente']->getEndereco(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="nome">Cidade</label>
                    <input type="text" class="form-control"  name="cidade" placeholder="Cidade" value="<?php echo $viewVar['cliente']->getCidade(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="nome">Estado</label>
                    <input type="text" class="form-control"  name="estado" placeholder="Estado" value="<?php echo $viewVar['cliente']->getEstado(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="nome">CEP</label>
                    <input type="text" class="form-control"  name="cep" placeholder="CEP" value="<?php echo $viewVar['cliente']->getCep(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="nome">Status</label>
                    
                    <select name="status" id="status">
                        <option value="0" <?php if( $viewVar['cliente']->getStatus() == "0") { ?> active <?php } ?> >Ativo</option>
                        <option value="1"<?php if( $viewVar['cliente']->getStatus() == "1") { ?> active <?php } ?> >Inativo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/cliente" class="btn btn-info btn-sm">Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
