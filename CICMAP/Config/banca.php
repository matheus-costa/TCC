<?php
include_once("../Connection/connection.php");
try {
    
    // Obter os dados do formulário
    $id = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $numeracao = $_REQUEST['numeracao'];
    

    // Preparar a consulta SQL com placeholders
    $sql = "INSERT INTO banca (nome, numeracao) VALUES (:nome, :numeracao)";



    // Preparar a declaração
    $stmt = $conexao->prepare($sql);

    // Vincular os parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':numeracao', $numeracao);
    

    // Executar a consulta
    $stmt->execute();

    

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechar conexão
$conexao = null;
?>