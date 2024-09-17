<?php
include_once ("../../includes/header.php");
?>
<?php
include_once("../../Config/connection.php");

$sql = "SELECT * FROM funcionario";
$resultado = $conexao->query($sql)->fetchAll(); #DÁ ERRO
unset($conexao);
?> 
   <?php if(count($resultado) > 0): ?>
      <div class="row">
        <div class="col s12 m6 push-m3">
         <h3 class="light"> Lista de Funcionários</h3>
       <table class="striped">
        <thead>
          <tr>
            <th scope="col">Nome:</th>
            <th scope="col">CPF:</th>
            <th scope="col">RG</th>
            <th scope="col">E-Mail:</th>
            <th scope="col">Telefone:</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($resultado as $data): ?>
            <tr>
              <td scope="row"><?= $data["nome"] ?></td>
              <td scope="row"><?= $data["cpf"] ?></td>
              <td scope="row"><?= $data["rg"] ?></td>
              <td scope="row"><?= $data["email"] ?></td>
              <td scope="row"><?= $data["telefone"] ?></td>
              <td><a href="edita_funcionario.php?id=<?= $data['id']?>" class="btn green">Editar</a></td>

              <td><a href="deleta_funcionario.php?id=<?=$data['id']?>" class="btn-floating red"><i class="material-icons" name ="btn-delete" class="btn">delete</td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <?php endif; ?>
    <br>
            <td><a href="funcionario.php"  class="btn green">Voltar</a></td>
            <td><a href="cadastro_funcionario.php" class="btn green">Cadastrar Novo Funcionario</a></td>
</div>
<?php
include_once("../../includes/footer.php");
?>
