<?php
#include_once("includes\header.php");
include_once('../../includes/header.php');
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3> Cadastro de Funcionarios</h3>
        <form action="../../Config/funcionario_config.php" method="POST">
            <input type="hidden" name="type" value="create">
                    <p>Informe o seu Nome:<input type="text" name="nome" placeholder="Informe o seu nome:"/>
                    </p>
                    <p>Informe o seu CPF:<input type="text" name="cpf" placeholder="Informe o seu CPF:"/>
                    </p>
                    <p>Informe o seu RG:<input type="text" name="rg" placeholder="Informe o seu RG:" />
                    </p>
                    <p>Informe o seu E-mail:<input type="email" name="email" placeholder="Informe o seu E-mail:" />
                    </p>
                    <p>Informe o seu número de telefone:<input type="text" name="telefone" placeholder="Informe o seu número de telefone:" />
                    </p>
                    <p>Informe o seu endereço:<input type="text" name="endereco"  placeholder="Informe o seu endereço:" />
                    </p>
                    <button type="submit" name="btn-cadastrar" class="btn green">Cadastrar Funcionario</button>
            <a href="funcionario.php" class="btn green">Voltar</a>
        </form>


        <?php
        include_once("../../includes/footer.php");
        ?>