<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://<?php echo APP_HOST; ?>">IFPR - ADS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php if ($viewVar['nameController'] == "HomeController") { ?> class="active" <?php } ?>>
                    <a href="http://<?php echo APP_HOST; ?>">Principal</a>
                </li>

                <li class="dropdown <?php if ($viewVar['nameController'] == "ProdutoController" ) { ?> active<?php }?>">
                    <a href="#" class="dropdown-toggle"
                       data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="true"
                    >
                        Produto <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li <?php if ($viewVar['nameController'] == "ProdutoController" && ($viewVar['nameAction'] == "" || $viewVar['nameAction'] == "index")) { ?> class="active" <?php } ?>>
                            <a href="http://<?php echo APP_HOST; ?>/produto">Lista de Produtos</a>
                        </li>
                        <li <?php if ($viewVar['nameController'] == "ProdutoController" && $viewVar['nameAction'] == "cadastro") { ?> class="active" <?php } ?>>
                            <a href="http://<?php echo APP_HOST; ?>/produto/cadastro">Cadastro de Produto</a>
                        </li>
                    </ul>

                </li>

                <li class="dropdown <?php if ($viewVar['nameController'] == "CategoriaprodutoController" ) { ?> active<?php }?>">
                    <a href="#" class="dropdown-toggle"
                       data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="true"
                    >
                        Categoria de Produto <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li <?php if ($viewVar['nameController'] == "CategoriaprodutoController" && ($viewVar['nameAction'] == "" || $viewVar['nameAction'] == "index")) { ?> class="active" <?php } ?>>
                            <a href="http://<?php echo APP_HOST; ?>/categoriaproduto">Lista de Categorias de Produto</a>
                        </li>
                        <li <?php if ($viewVar['nameController'] == "CategoriaprodutoController" && $viewVar['nameAction'] == "cadastro") { ?> class="active" <?php } ?>>
                            <a href="http://<?php echo APP_HOST; ?>/categoriaproduto/cadastro">Cadastro de Categoria de Produto</a>
                        </li>
                    </ul>

                </li>

                <li class="dropdown <?php if ($viewVar['nameController'] == "UsuarioController" ) { ?> active<?php }?>">
                    <a href="#" class="dropdown-toggle"
                       data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="true"
                    >
                        Usuario <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li <?php if ($viewVar['nameController'] == "UsuarioController" && ($viewVar['nameAction'] == "" || $viewVar['nameAction'] == "index")) { ?> class="active" <?php } ?>>
                            <a href="http://<?php echo APP_HOST; ?>/usuario">Lista de Usuários</a>
                        </li>
                        <li <?php if ($viewVar['nameController'] == "UsuarioController" && $viewVar['nameAction'] == "cadastro") { ?> class="active" <?php } ?>>
                            <a href="http://<?php echo APP_HOST; ?>/usuario/cadastro">Cadastro de Usuário</a>
                        </li>
                    </ul>

                </li>

            </ul>
        </div>
    </div>
</nav>


