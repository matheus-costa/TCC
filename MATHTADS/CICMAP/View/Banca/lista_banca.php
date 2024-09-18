<?php
include_once("../../includes/header.php");
?>
<?php
include_once("../../Config/connection.php");

$sql = "SELECT * FROM banca";
$resultado = $conexao->query($sql)->fetchAll();

unset($conexao);
?>
<?php if (count($resultado) > 0): ?>
  <div class="row">
    <div class="col s12 m6 push-m3">
      <h3 class="light"> Lista de Bancas</h3>

      <form method="POST">
        <input name="nomebusca" placeholder="Digite o nome da banca para a busca:" type="text">
        <button type="submit">Pesquisar</button>
      </form>
      <br>

      <table class="striped">
        <thead>
          <tr>
            <th scope="col">Nome:</th>
            <th scope="col">Numercao:</th>
          </tr>
          <?php
          if (!isset($_GET['nomebusca'])) {
          ?>
            <tr> Banca não encontrada </tr>
            <?php
          } else {
            $pesquisa = $_GET['nomebusca'];
            $sql_busca = "SELECT nome, numeracao FROM banca WHERE nome = '".$pesquisa. "'";
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
                  <td scope="row"><?= $data["numeracao"] ?></td>
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
              <td scope="row"><?= $data["numeracao"] ?></td>
              <td><a href="edita_banca.php?id=<?= $data["id"] ?>" class="btn green">Editar</a></td>

              <td><a href="deleta_banca.php?id=<?= $data["id"] ?>"class="btn-floating red"><i class="material-icons" name ="btn-delete" class="btn">delete</td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
    <?php endif; ?>
    <br>
    <td><a href="banca.php" class="btn green">Voltar</a></td>
    <td><a href="cadastro_banca.php" class="btn green">Cadastrar Nova Banca</a></td>
    </div>
    <?php
    include_once("../../includes/footer.php");
    ?>