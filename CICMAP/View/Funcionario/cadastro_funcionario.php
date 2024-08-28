<?php
#include_once("includes\header.php");
include_once('../../includes/header.php');
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3> Cadastro de Funcionários </h3>
        <form action="../../Config/funcionario_config.php" method="POST">
            <input type="hidden" name="type" value="create">
            <div class="input-field col s12">
            Informe o seu Nome:<input type="text" id="nome" name="nome" placeholder="Informe o seu nome:" />
            </div>
            <div class="input-field col s12">
            Informe o seu CPF:<input type="text" name="cpf" placeholder="Informe o seu CPF:" />
            </div>
            <div class="input-field col s12">
            Informe o seu RG:<input type="number" name="rg" placeholder="Informe o seu RG:" />
            </div>
            <div class="input-field col s12">
            Informe o seu E-mail: <input type="email" name="email" placeholder="Informe o seu E-Mail:" />
            </div>
            <div class="input-field col s12">
            Informe o seu Telefone: <input type="number" name="telefone" placeholder="Informe o seu Telefone:" />
            </div>
            <div class="input-field col s12">
            Informe o seu Endereço: <input type="text" name="endereco" placeholder="Informe o seu Endereço:" />
            </div>
            <button type="submit" name="btn-cadastrar" class="btn green">Cadastrar Funcionario</button>
            <a href="funcionario.php" class="btn green">Voltar</a>
        </form>


        <?php
        include_once("../../includes/footer.php");
        ?>