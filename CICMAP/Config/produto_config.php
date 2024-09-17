<?php
   include_once ("connection.php");
   
$data = $_POST;

if(!empty($data)){
    
    if($data["type"] === "create"){
         $nome = $data["nome"];
         $tamanho = $data["tamanho"];
         $marca = $data["marca"];
         $preco = $data["preco"];
         
    
    // Obter os dados do formulário
    $nome = $_REQUEST["nome"];
    $tamanho = $_REQUEST["tamanho"];
    $marca = $_REQUEST["marca"];
    $preco = $_REQUEST["preco"];


    // Preparar a consulta SQL com placeholders
    $sql = "INSERT INTO produto (nome, tamanho, marca, preco) VALUES (:nome, :tamanho, :marca, :preco)";

    // Preparar a declaração
    $stmt = $conexao->prepare($sql);

    // Vincular os parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':tamanho', $tamanho);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':preco', $preco);
      }
    try {
        $stmt->execute();
    ?>    
        <script>
        setTimeout(function() {
            window.location.assign("../View/Produto/lista_produto.php");
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

if(isset($_POST['btn-delete']))://verifica se o botão foi clicado

    $id = $_POST["id"];
    $sql = "DELETE FROM produto where :id = $id";
    
endif;