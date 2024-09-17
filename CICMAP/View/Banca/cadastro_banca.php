<?php
#include_once("includes\header.php");
include_once('../../includes/header.php');
?>
<div class="row">
    <div class="col s12 m6 push-m3">
        <h3> Cadastro de Banca </h3>
        <form action="../../Config/banca_config.php" method="POST">
            <input type="hidden" name="type" value="create">
            <div class="input-field col s12">
            Informe o nome da sua banca:<input type="text" id="nome" name="nome" placeholder="Informe o nome da sua banca:" />
            </div>
            <div class="input-field col s12">
            Informe a numeração da sua banca:<input type="text" name="numeracao" placeholder="Informe a numeração da sua Banca:" />
            </div>
            <button type="submit" name="btn-cadastrar" class="btn green">Cadastrar Banca</button>

            <a href="banca.php" class="btn green">Voltar</a>
        </form>


        <?php
        include_once("../../includes/footer.php");
        ?>