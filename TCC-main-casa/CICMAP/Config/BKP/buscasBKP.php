<?php
$pesquisa = $_GET['nomebusca'];
          $sql_busca = "SELECT nome, cpf, rg, email, telefone, endereco FROM cliente WHERE nome LIKE '$pesquisa'";
          $resultadobusca = $conexao->query($sql_busca)->fetchAll();
