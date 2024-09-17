<?php
session_start();
include_once('connection.php');

$data = $_POST;

if(!empty($data)){
    
    if($data["type"] === "create"){
         $nome = $data["nome"];
         $numeracao = $data["numeracao"];
   

         // Preparar a consulta SQL com placeholders
        $sql = "INSERT INTO banca (nome, numeracao) VALUES (:nome, :numeracao)";
         // Preparar a declaração

         $stmt = $conexao->prepare($sql);

         $stmt->bindParam(':nome', $nome);// Vincular os parâmetros
         $stmt->bindParam(':numeracao', $numeracao);
    }
    try {
        $stmt->execute();
    ?>    
        <script>
        setTimeout(function() {
            window.location.assign("../View/Banca/lista_banca.php");
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
    else {
        if(!empty($_GET)) {
            $id = $_GET["id"];
        }
        // Retorna o dado de um banca
    
        if(!empty($id)){
            $query = "SELECT * FROM banca WHERE id = :id";
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $banca = $stmt->fetch();
        }else{
          
            $bancas = [];
            $select = "SELECT * FROM banca";
            $stmt = $conexao->prepare($select);
            $stmt->execute();
            $bancas = $stmt->fetchAll();
        }
    }
    if(isset($_POST['btn-delete']))://verifica se o botão foi clicado

        $id = $_POST["id"];
        $sql = "DELETE FROM banca where :id = $id";
        
        endif;    