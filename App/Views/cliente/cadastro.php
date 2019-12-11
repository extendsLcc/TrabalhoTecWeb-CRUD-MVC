<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Cliente</h3>
            
            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/cliente/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="nomeFantasia">Nome Fantasia</label>
                    <input type="text" class="form-control"  name="nomeFantasia" placeholder="Nome do Cliente" value="<?php echo $Sessao::retornaValorFormulario('nomeFantasia'); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="razaoSocial">Razão Social</label>
                    <input type="text" class="form-control"  name="razaoSocial" placeholder="Razão Social" value="<?php echo $Sessao::retornaValorFormulario('razaoSocial'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="tipoCliente">Tipo Cliente</label>
                    <select name="tipoCliente" id="tipoCliente">
                        <option value="Pessoa Fisica" <?php if( $Sessao::retornaValorFormulario('tipoCliente') == "Pessoa Fisica") { ?> active <?php } ?> >Pessoa Física</option>
                        <option value="Pessoa Juridica"<?php if( $Sessao::retornaValorFormulario('tipoCliente') == "Pessoa Juridica") { ?> active <?php } ?> >Pessoa Juridica</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="cpfCnpj">CPF/CPNJ</label>
                    <input type="text" class="form-control"  name="cpfCnpj" placeholder="CPF/CPNJ" value="<?php echo $Sessao::retornaValorFormulario('cpfCnpj'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control"  name="email" placeholder="Email" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control"  name="telefone" placeholder="Telefone" value="<?php echo $Sessao::retornaValorFormulario('telefone'); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control"  name="endereco" placeholder="Endereço" value="<?php echo $Sessao::retornaValorFormulario('endereco'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control"  name="cidade" placeholder="Cidade" value="<?php echo $Sessao::retornaValorFormulario('cidade'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control"  name="estado" placeholder="Estado" value="<?php echo $Sessao::retornaValorFormulario('estado'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control"  name="cep" placeholder="CEP" value="<?php echo $Sessao::retornaValorFormulario('cep'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="nome">Status</label>
                    
                    <select name="status" id="status">
                        <option value="0" <?php if( $Sessao::retornaValorFormulario('status') == "0") { ?> active <?php } ?> >Ativo</option>
                        <option value="1"<?php if( $Sessao::retornaValorFormulario('status') == "1") { ?> active <?php } ?> >Inativo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>