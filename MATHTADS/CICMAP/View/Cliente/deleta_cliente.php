<?php
include_once("../../Config/connection.php");

$id =  $_REQUEST['id'] ;

$sql = "DELETE FROM  cliente  where \"id\"='".$id."'; ";
$resultado = $conexao->exec($sql);

unset($conexao);
if ($resultado) {
?>
    <p>Cliente deletado com sucesso.</p>
    <script>
        setTimeout(function() {
            window.location.assign('lista_cliente.php');
        }, 2000);
    </script>
<?php
} else {
?>
    <p>Erro ao deletar.</p>
    <script>
        setTimeout(function() {
            window.history.back();
        }, 2000);
    </script>
<?php
}

