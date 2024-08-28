<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Somador de valores</title>
</head>

<body>
    <?php // pegando os dados
      $valor1 = $_GET['v1'] ?? 0;
      $valor2 = $_GET['v2'] ?? 0; 
    ?>
    <main>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
            <br>
            <label for="v1"> Valor 1:</label>
            <input type="number" name="v1" id="v1" value="<?=$valor1?>">
            <br>
            <label for="v2"> Valor 2:</label>
            <input type="number" name="v2" id="v2" value="<?=$valor2?>">
            <br>
            <br>
            <input type="submit" value="Somar">  
        </form>
    </main>
    <section id="resultado">
      <h2>Resultado da soma </h2>
      <?php
          $soma = $valor1 + $valor2;
          print "<p> a soma entre os valores $valor1 e $valor2 é  <strong> a $soma.</strong></p>";
      ?>
    </section>
</body>
</html>