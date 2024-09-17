<?php
include_once ("../../../includes/header.php");
include_once("../../../Config/connection.php");

$sql = "SELECT * FROM produto";
$resultado = $conexao->query($sql)->fetchAll(); #DÁ ERRO
unset($conexao);
?>
     <form method="POST">
        <input name="nomebusca" placeholder="Digite o nome do cliente para a busca:" type="text">
        <button type="submit">Pesquisar</button>
      </form>

      <?php if(count($resultado) > 0): ?>
      <div class="row">
        <div class="col s12 m6 push-m3">
         <h3 class="light"> Lista de Produtos</h3>
       <table class="striped">
        <thead>
          <tr>
            <th scope="col">Nome:</th>
            <th scope="col">Tamanho:</th>
            <th scope="col">Marca</th>
            <th scope="col">Preço:</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($resultado as $data): ?>
            <tr>
              <td scope="row"><?= $data["nome"] ?></td>
              <td scope="row"><?= $data["tamanho"] ?></td>
              <td scope="row"><?= $data["marca"] ?></td>
              <td scope="row"><?= $data["preco"] ?></td>
              <td><a href="comprar_produto.php?id=<?= $data['id']?>" class="btn green">Adicionar ao Carrinho</a></td>
              </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <?php endif; ?>      

<?php
include_once("../../../includes/footer.php");
?>