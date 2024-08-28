<?php
   include_once ("connection.php");
   $data = $_POST;

   if(!empty($data)){
       
       if($data["type"] === "create"){
    // Obter os dados do formulário
    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $rg =  $_REQUEST['rg'];
    $email = $_REQUEST['email'];  
    $telefone = $_REQUEST['telefone'];
    $cnpj = $_REQUEST['cnpj'];
    // Preparar a consulta SQL com placeholders
    $sql = "INSERT INTO fornecedor (nome, cpf, rg, email, telefone, cnpj) VALUES (:nome, :cpf, :rg, :email, :telefone, :cnpj)";

    // Preparar a declaração
    $stmt = $conexao->prepare($sql);

    // Vincular os parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':rg', $rg);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':cnpj', $cnpj);
       }

    // Executar a consulta
    try {
        $stmt->execute();
    ?>    
        <script>
        setTimeout(function() {
            window.location.assign("../View/Cliente/fornecedor.php");
        }, 2000);
        </script>
    <?php    
    }
    catch(PDOException $e) {
    ?>
     <script>
        setTimeout(function() {
            window.history.back();
        }, 2000);
    </script>
    <?php    
        // Erro na conexão
        $error = $e->getMessage();
        echo "ERRO: $error";
    }

}