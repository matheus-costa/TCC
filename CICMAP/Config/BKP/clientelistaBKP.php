


<?php
include_once("../../includes/header.php");
?>
<?php
include_once("../../Config/connection.php");

$sql = "SELECT * FROM cliente";
$resultado = $conexao->query($sql)->fetchAll(); #DÁ ERRO
unset($conexao);
?> 
   <?php if(count($resultado) > 0): ?>
      <div class="row">
        <div class="col s12 m6 push-m3">
         <h3 class="light"> Clientes</h3>
       <table class="striped">
        <thead>
          <tr>
            <th scope="col">Nome:</th>
            <th scope="col">CPF:</th>
            <th scope="col">RG</th>
            <th scope="col">E-Mail:</th>
            <th scope="col">Telefone:</th>
            <th scope="col">Endereço:</th>
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
              <td scope="row"><?= $data["endereco"] ?></td>
              <td><a href=""class="btn-floating orange"><i class="material-icons">edit</td>
              <td><a href=""class="btn-floating red"><i class="material-icons">delete</td>
            </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <?php endif; ?>
    <br>
            <td><a href="cliente.php"  class="btn green">Voltar</a></td>
</div>
<?php
include_once("../../includes/footer.php");
?>

