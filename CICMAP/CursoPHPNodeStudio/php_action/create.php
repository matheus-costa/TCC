<?php 
include_once("db_connect.php");

if(isset($_POST['btn-cadastrar']))://verifica se o botão foi clicado

    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $email = $_POST["email"];
    $idade = $_POST["idade"];

    $sql = "INSERT INTO cliente (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";
    
endif;