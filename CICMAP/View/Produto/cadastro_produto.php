<?php
#include_once("includes\header.php");
include_once('../../includes/header.php');
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3> Cadastro de Produtos</h3>
        <form action="../../Config/produto_config.php" method="POST">
            <input type="hidden" name="type" value="create">
                    <p>Informe o nome do produto:<input type="text" name="nome" placeholder="Informe o nome do produto"/>
                    </p>
                    <p>Informe o tamanho do produto:<input type="text" name="tamanho" placeholder="Informe o tamanho do produto" />
                    </p>
                    <p>Informe a marca do produto:<input type="text" name="marca" placeholder="Informe a marca do produto"/>
                    </p>
                    <p>Informe o preço do produto:<input type="text" name="preco" placeholder="Informe o preço do produto" />
                    </p>
                    <button type="submit" name="btn-cadastrar" class="btn green">Cadastrar Produto</button>
            <a href="produto.php" class="btn green">Voltar</a>
        </form>


        <?php
        include_once("../../includes/footer.php");
        ?>