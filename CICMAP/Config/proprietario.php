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
    $endereco = $_REQUEST['endereco'];

    $sql = "INSERT INTO proprietario (default,nome, cpf, rg, email, telefone, endereco) VALUES (:nome, :cpf, :rg, :email, :telefone, :endereco)";



    $stmt = $conexao->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':rg', $rg);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':endereco', $endereco);
    

    $stmt->execute();
     
    $sqlTwo ="DELETE FROM proprietario WHERE :id ==  $id;";

    $sqlThree = "SELECT * FROM proprietario WHERE :id == $id";
    
    $sql = "SELECT * FROM proprietario";


    $stmt = $conexao->prepare($sqlTwo);

    

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechar conexão
$conexao = null;
?>