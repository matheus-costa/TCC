<?php

include_once("../../Config/connection.php");

$sql = "UPDATE funcionario SET \"nome\"='" . $_REQUEST['nome'] ."',\"tamanho\"='" . $_REQUEST['tamanho']. "',
\"marca\"='"  .$_REQUEST['marca']."', 
\"preco\"='".$_REQUEST['preco'] ."' 
where \"id\"='" . $_REQUEST['id'] . "'; ";
$resultado = $conexao->exec($sql);

unset($conexao);
if ($resultado) {
?>
    <p>Editado com sucesso.</p>
    <script>
        setTimeout(function() {
            window.location.assign('lista_funcionario.php');
        }, 2000);
    </script>
<?php
} else {
?>
    <p>Erro ao editar.</p>
    <script>
        setTimeout(function() {
            window.history.back();
        }, 2000);
    </script>
<?php
}
