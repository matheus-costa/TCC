<?php
session_start();
include_once('connection.php');

$data = $_POST;

if(!empty($data)){
    
    if($data["type"] === "create"){
         $nome = $data["nome"];
         $cpf = $data["cpf"];
         $rg = $data["rg"];
         $email = $data["email"];
         $telefone = $data["telefone"];
         $endereco = $data["endereco"];

         // Preparar a consulta SQL com placeholders
        $sql = "INSERT INTO cliente (nome, cpf, rg, email, telefone, endereco) VALUES (:nome, :cpf, :rg, :email, :telefone, :endereco)";
         // Preparar a declaração

         $stmt = $conexao->prepare($sql);

         $stmt->bindParam(':nome', $nome);// Vincular os parâmetros
         $stmt->bindParam(':cpf', $cpf);
         $stmt->bindParam(':rg', $rg);
         $stmt->bindParam(':email', $email);
         $stmt->bindParam(':telefone', $telefone);
         $stmt->bindParam(':endereco', $endereco);
    }
    try {
        $stmt->execute();
    ?>    
        <script>
        setTimeout(function() {
            window.location.assign("../View/Cliente/cliente.php");
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
    else if( $data["type"] === "delete"){
        $id = $data["id"];

        $query = "DELETE FROM cliente WHERE id = ':id';";

        $stmt = $conexao->prepare($query);

        try {
            $stmt->execute();
           
        }
        catch(PDOException $e) {
           
            // Erro na conexão
            $error = $e->getMessage();
            echo "ERRO: $error";
        }
    }    
    else {
        if(!empty($_GET)) {
            $id = $_GET["id"];
        }
        // Retorna o dado de um cliente
    
        if(!empty($id)){
            $query = "SELECT * FROM cliente WHERE id = :id";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $cliente = $stmt->fetch();
        }else{
            // Retorna todos os clientes
            $cliente = [];
            $select = "SELECT * FROM cliente";
            $stmt = $conexao->prepare($select);
            $stmt->execute();
            $clientes = $stmt->fetchAll();
        }
    }