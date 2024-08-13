<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 5</title>
</head>
<body>
    <main>
      <h1>Analisador de número real</h1>

      <?php 
        $num = $_POST["n"] ?? 0;

        echo "Analisando o número <strong>". number_format($num , 3, " ,", ".")."</strong> informado pelo usuário.";
        
        $int = (int) $num;
        $fra = $num - $int;
        
        echo "<ul><li> A parte inteira do número é <strong>".number_format($int,0, ",", ".")."</strong></li>";

        echo "<li> A parte fracionario do número é <strong>".number_format($fra,3, ",", ".")."</strong></li></ul>";
    
      ?>
      <p><a href="javascript:history.go(-1)">Voltar para a pagina anterior</a></p>
    </main>
</body>
</html>