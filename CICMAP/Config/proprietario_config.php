<?php
include_once("connection.php");
$data = $_POST;

if(!empty($data)){
    // Obter os dados do formulário
    $nome = $_REQUEST['nome'];
    $cpf = $_REQUEST['cpf'];
    $rg =  $_REQUEST['rg']; 
    $telefone = $_REQUEST['telefone'];
    $endereco = $_REQUEST['endereco'];

    $sql = "INSERT INTO proprietario (nome, cpf, rg,  telefone, endereco) VALUES (:nome, :cpf, :rg,:telefone, :endereco)";

    $stmt = $conexao->prepare($sql);

    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':rg', $rg);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':endereco', $endereco);
    
}
try {
    $stmt->execute();
?>    
    <script>
    setTimeout(function() {
        window.location.assign("../View/Proprietario/lista_proprietario.php");
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


if(isset($_POST['btn-delete']))://verifica se o botão foi clicado

$id = $_POST["id"];
$sql = "DELETE FROM proprietario where :id = $id";

endif;