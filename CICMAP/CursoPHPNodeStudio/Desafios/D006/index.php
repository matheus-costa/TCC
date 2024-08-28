<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anatomia da Divisão</title>
</head>

<body>
    <?php // pegando os dados
    $valor1 = $_GET['v1'] ?? 0;
    $valor2 = $_GET['v2'] ?? 0;
    ?>
    <main>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
            <br>
            <label for="v1"> Divisor:</label>
            <input type="number" name="v1" id="v1" value="<?= $valor1 ?>">
            <br>
            <label for="v2"> Dividendo:</label>
            <input type="number" name="v2" id="v2" value="<?= $valor2 ?>">
            <br>
            <br>
            <input type="submit" value="Dividir">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado da divisão </h2>
        <?php
        $divisao = $valor1 / $valor2;
        $resto = $valor1 % $valor2;
        print "<p> a divisão entre o dividendo $valor1 e o Divisor $valor2 é  <strong> a $divisao.</strong></p> 
        <p>O resto é <strong>$resto.</strong></p>";

        ?>
    </section>
</body>

</html>