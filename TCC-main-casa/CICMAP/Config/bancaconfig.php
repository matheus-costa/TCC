<?php
include_once("../Connection/connection.php");
try {
    // Obter os dados do formulário
    $id = $_REQUEST['id'];
    $nome = $_REQUEST['nome'];
    $numeracao = $_REQUEST['numeracao'];
    $sql = "INSERT                                                                                                                                                                                                     INTO banca (nome, numeracao) VALUES (:nome, :numeracao)";// Preparar a consulta SQL com placeholders
    $stmt = $conexao->prepare($sql);   // Preparar a declaração
    $stmt->bindParam(':nome', $nome); // Vincular os parâmetros
    $stmt->bindParam(':numeracao', $numeracao);
    $stmt->execute();// Executar a consulta 
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechar conexão
$conexao = null;
?>