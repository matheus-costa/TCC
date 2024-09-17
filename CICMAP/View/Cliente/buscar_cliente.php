<?php
include_once("../../includes/header.php");
?>
<?php
include_once("../../Config/connection.php");

$sql = "SELECT * FROM cliente where nome = '" . $_REQUEST['nome'] . "'";
$resultado = $conexao->query($sql)->fetchAll(); 

$resultado2 = [];

$resultado = $conexao->query($sql);
$resultado2 = $resultado->fetch();