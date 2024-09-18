<?php

include_once("../../Config/connection.php");

$sql = "UPDATE funcionario SET \"nome\"='" . $_REQUEST['nome'] ."',\"cpf\"='" . $_REQUEST['cpf']. "',
\"rg\"='"  .$_REQUEST['rg']."', 
\"email\"='".$_REQUEST['email']."',
\"telefone\"='".$_REQUEST['telefone']."',  
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
