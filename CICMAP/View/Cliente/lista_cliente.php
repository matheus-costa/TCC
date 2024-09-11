<?php
include_once("../../includes/header.php");
?>
<?php
include_once("../../Config/connection.php");

$sql = "SELECT * FROM cliente";
$resultado = $conexao->query($sql)->fetchAll();

unset($conexao);
?>
<?php if (count($resultado) > 0): ?>
  <div class="row">
    <div class="col s12 m6 push-m3">
      <h3 class="light"> Lista de Clientes</h3>

      <form method="POST">
        <input name="nomebusca" placeholder="Digite o nome do cliente para a busca:" type="text">
        <button type="submit">Pesquisar</button>
      </form>
      <br>

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
          <?php
          if (!isset($_GET['nomebusca'])) {
          ?>
            <tr> Cliente não encontrado </tr>
            <?php
          } else {
            $pesquisa = $_GET['nomebusca'];
            $sql_busca = "SELECT nome, cpf, rg, email, telefone, endereco FROM cliente WHERE nome = '".$pesquisa. "'";
            $resultadobusca = $conexao->query($sql_busca)->fetchAll();

            if ($resultadobusca->num_rows == 0) {
            ?>
              <tr colalspan="3"> Nenhum valor encontrado!!</tr>
              <?php
            } else {
              while ($data) {
              ?>
                <tr>
                  <td scope="row"><?= $data["nome"] ?></td>
                  <td scope="row"><?= $data["cpf"] ?></td>
                  <td scope="row"><?= $data["rg"] ?></td>
                  <td scope="row"><?= $data["email"] ?></td>
                  <td scope="row"><?= $data["telefone"] ?></td>
                  <td scope="row"><?= $data["endereco"] ?></td>
                </tr>
          <?php
              }
            }
          }
          ?>
        </thead>
        <tbody>
          <?php foreach ($resultado as $data): ?>
            <tr>

              <td scope="row"><?= $data["nome"] ?></td>
              <td scope="row"><?= $data["cpf"] ?></td>
              <td scope="row"><?= $data["rg"] ?></td>
              <td scope="row"><?= $data["email"] ?></td>
              <td scope="row"><?= $data["telefone"] ?></td>
              <td scope="row"><?= $data["endereco"] ?></td>
              <td><a href="edita_cliente.php?id=<?= $data["id"] ?>" class="btn green">Editar</a></td>

              <td><a href="deleta_cliente.php?id=<?= $data["id"] ?>"class="btn-floating red"><i class="material-icons" name ="btn-delete" class="btn">delete</td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
    <?php endif; ?>
    <br>
    <td><a href="cliente.php" class="btn green">Voltar</a></td>
    <td><a href="cadastro_cliente.php" class="btn green">Cadastrar Novo Cliente</a></td>
    </div>
    <?php
    include_once("../../includes/footer.php");
    ?>