<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Editar Categoria de Produto</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/categoriaproduto/atualizar" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['categoriaProduto']->getId(); ?>">

                <div class="form-group">
                    <label for="quantidade">Descrição</label>
                    <textarea class="form-control" name="descricao" placeholder="Descrição da Categoria de produto" required><?php echo $viewVar['categoriaProduto']->getDescricao(); ?></textarea>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/categoriaproduto" class="btn btn-info btn-sm">Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
