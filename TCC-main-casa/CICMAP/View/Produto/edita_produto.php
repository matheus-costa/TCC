<?php
include_once("../../includes/header.php");
?>
<?php
include_once("../../Config/connection.php");

$sql = "SELECT * FROM produto where id = '" . $_REQUEST['id'] . "'";
$resultado = $conexao->query($sql)->fetchAll(); 

$resultado2 = [];

$resultado = $conexao->query($sql);
$resultado2 = $resultado->fetch();

unset($conexao);
?> 
   <?php if(count($resultado2) > 0): ?>
    <div class="row">
    <div class="col s12 m6 push-m3">
    <h3> Edita de Funcionario </h3>
   
        <form  action="update.php?id=<?php print $_REQUEST['id']; ?>"method="POST">
            <div class="input-field col s12">
            <p>Informe o nome do produto:<input type="text" name="nome" value="<?=  $resultado2["nome"]?>" />
            </p> 
            </div>
            <div class="input-field col s12">
            <p>Informe o tamanho do produto:<input type="text" name="nome" value="<?=  $resultado2["tamanho"]?>" />
            </p> 
            </div>
            <div class="input-field col s12">
            <p>Informe o seu marca do produto:<input type="text" name="nome" value="<?=  $resultado2["marca"]?>" />
            </p> 
            </div>
            <div class="input-field col s12">
            <p>Informe o  preço do produto:<input type="text" name="nome" value="<?=  $resultado2["preco"]?>" />
            </p> 
            <button class="btn green" type="submit">Atualizar</button>
        </form>
        <a href="produto.php" class="btn green">Voltar ao Menu Princial</a>
        </tbody>
    </table>
    <?php else: ?>
    <?php endif; ?>
<?php
include_once("../../includes/footer.php");
?>

