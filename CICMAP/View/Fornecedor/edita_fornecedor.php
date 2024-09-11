<?php
include_once("../../includes/header.php");
?>
<?php
include_once("../../Config/connection.php");

$sql = "SELECT * FROM fornecedor where id = '" . $_REQUEST['id'] . "'";
$resultado = $conexao->query($sql)->fetchAll(); 

$resultado2 = [];

$resultado = $conexao->query($sql);
$resultado2 = $resultado->fetch();

unset($conexao);
?> 
   <?php if(count($resultado2) > 0): ?>
    <div class="row">
    <div class="col s12 m6 push-m3">
    <h3> Edita de Fornecedor </h3>
   
        <form  action="update.php?id=<?php print $_REQUEST['id']; ?>"method="POST">
            <div class="input-field col s12">
            <p>Informe o seu Nome:<input type="text" name="nome" value="<?=  $resultado2["nome"]?>" />
            </p> 
            </div>
            <div class="input-field col s12">
            <p>Informe o seu cpf:<input type="text" name="nome" value="<?=  $resultado2["cpf"]?>" />
            </p> 
            </div>
            <div class="input-field col s12">
            <p>Informe o seu rg:<input type="text" name="nome" value="<?=  $resultado2["rg"]?>" />
            </p> 
            </div>
            <div class="input-field col s12">
            <p>Informe o seu cnpj:<input type="text" name="nome" value="<?=  $resultado2["cnpj"]?>" />
            </p> 
            </div>
            <div class="input-field col s12">
            <p>Informe o seu E-mail:<input type="text" name="nome" value="<?=  $resultado2["email"]?>" />
            </p> 
            </div>
            <div class="input-field col s12">
            <p>Informe o seu telefone:<input type="text" name="nome" value="<?=  $resultado2["telefone"]?>" />
            </p> 
            </div>
            <button class="btn green" type="submit">Atualizar</button>
        </form>
        <a href="fornecedor.php" class="btn green">Voltar ao Menu Princial</a>
        </tbody>
    </table>
    <?php else: ?>
    <?php endif; ?>
<?php
include_once("../../includes/footer.php");
?>

