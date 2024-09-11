<?php
#include_once("includes\header.php");
include_once('../../includes/header.php');
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3> Cadastro de Proprietários</h3>
        <form action="../../Config/proprietario_config.php" method="POST">
            <input type="hidden" name="type" value="create">
                    <p>Informe o nome do proprietario:<input type="text" name="nome" placeholder="Informe o nome do produto"/>
                    </p>
                    <p>Informe o cpf do proprietario:<input type="text" name="cpf" placeholder="Informe o tamanho do produto" />
                    </p>
                    <p>Informe o rg do proprietario:<input type="text" name="rg" placeholder="Informe a marca do produto"/>
                    </p>
                    <p>Informe o número de telefone do proprietario:<input type="text" name="telefone" placeholder="Informe o preço do produto" />
                    </p>
                    <p>Informe o endereço do proprietario:<input type="text" name="endereco" placeholder="Informe o preço do produto" />
                    </p>
                    <button type="submit" name="btn-cadastrar" class="btn green">Cadastrar Proprietario</button>
            <a href="proprietario.php" class="btn green">Voltar</a>
        </form>


        <?php
        include_once("../../includes/footer.php");
        ?>