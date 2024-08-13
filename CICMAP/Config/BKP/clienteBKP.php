<?php
try {
    
    // Obter os dados do formulário
    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $rg =  $_REQUEST['rg'];
    $email = $_REQUEST['email'];  
    $telefone = $_REQUEST['telefone'];
    $endereco = $_REQUEST['endereco'];

    // Preparar a consulta SQL com placeholders
    $sql = "INSERT INTO cliente (nome, cpf, rg, email, telefone, endereco) VALUES (:nome, :cpf, :rg, :email, :telefone, :endereco)";
    // Preparar a declaração
    $stmt = $conexao->prepare($sql);

    // Vincular os parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':rg', $rg);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':endereco', $endereco);

    // Executar a consulta
    $stmt->execute();

    $sql = "delete from cliente where id = :id;";



    

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechar conexão
$conexao = null;
?>