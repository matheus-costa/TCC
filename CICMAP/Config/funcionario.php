<?php
include_once("../Connection/connection.php");
try {
    
    // Obter os dados do formulário
    $id = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $rg =  $_REQUEST['rg'];
    $email = $_REQUEST['email'];  
    $telefone = $_REQUEST['telefone'];

    // Preparar a consulta SQL com placeholders
    $sql = "INSERT INTO funcionario (default,nome, cpf, rg, email, telefone) VALUES (:nome, :cpf, :rg, :email, :telefone)";



    // Preparar a declaração
    $stmt = $conexao->prepare($sql);

    // Vincular os parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':rg', $rg);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    

    // Executar a consulta
    $stmt->execute();
     
    $sqlTwo ="DELETE FROM funcionario WHERE :id ==  $id;";

    $sqlThree = "SELECT * FROM funcionario WHERE :id == $id";
    
    $sql = "SELECT * FROM funcionario";


    $stmt = $conexao->prepare($sqlTwo);

    

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechar conexão
$conexao = null;
?>