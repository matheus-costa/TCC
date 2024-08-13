<?php
   include_once ("CICMAP/Connection/connection_TCC.php");
try {
    
    // id serial primary key,nome varchar(200),tamanho varchar,marca varchar, preco float
    $nome = $_REQUEST['nome'];
    $tamanho = $_REQUEST['tamanho'];
    $marca =  $_REQUEST['marca'];
    $preco = $_REQUEST['preco'];  
    

    // Preparar a consulta SQL com placeholders
    $sql = "INSERT INTO produto (nome, tamanho, marca, preco) VALUES (:nome, :tamanho,:marca, :preco)";



    // Preparar a declaração
    $stmt = $conexao->prepare($sql);

    // Vincular os parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':tamanho', $tamanho);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':preco', $preco);
    
    

    // Executar a consulta
    $stmt->execute();

    

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechar conexão
$conexao = null;
?>
?>
