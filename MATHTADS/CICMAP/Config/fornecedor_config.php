<?php
   include_once ("connection.php");
   
$data = $_POST;

if(!empty($data)){
    
    if($data["type"] === "create"){
         $nome = $data["nome"];
         $cpf = $data["cpf"];
         $rg = $data["rg"];
         $email = $data["email"];
         $telefone = $data["telefone"];
         $endereco = $data["endereco"];
    
    // Obter os dados do formulário
    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $rg =  $_REQUEST['rg'];
    $cnpj =  $_REQUEST['cnpj'];
    $email = $_REQUEST['email'];  
    $telefone = $_REQUEST['telefone'];

    // Preparar a consulta SQL com placeholders
    $sql = "INSERT INTO fornecedor (nome, cpf, rg, cnpj, email, telefone) VALUES (:nome, :cpf, :rg, :cnpj, :email, :telefone)";

    // Preparar a declaração
    $stmt = $conexao->prepare($sql);

    // Vincular os parâmetros
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':rg', $rg);
    $stmt->bindParam(':cnpj', $cnpj);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
      }
    try {
        $stmt->execute();
    ?>    
        <script>
        setTimeout(function() {
            window.location.assign("../View/Fornecedor/lista_fornecedor.php");
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
    $sql = "DELETE FROM fornecedor where :id = $id";
    
endif;