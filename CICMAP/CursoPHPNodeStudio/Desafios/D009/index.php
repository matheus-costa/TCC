<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raizes</title>
</head>

<body>
    <?php // pegando os dados
    $valor1 = $_GET['v1'] ?? 0;
    $valor2 = $_GET['v2'] ?? 0;
    $peso1 = $_GET['p1'] ?? 0;
    $peso2 = $_GET['p2'] ?? 0;
    ?>
    <main>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
            <br>
            <label for="v1"> Valor 1:</label>
            <input type="number" name="v1" id="v1" value="<?= $valor1 ?>">
            <br>
            <br>
            <label for="p1"> Peso 1:</label>
            <input type="number" name="p1" id="p1" value="<?= $peso1 ?>">
            <br>
            <br>
            <label for="v2"> Valor 2:</label>
            <input type="number" name="v2" id="v2" value="<?= $valor2 ?>">
            <br>
            <br>
            <label for="p2"> Peso 2:</label>
            <input type="number" name="p2" id="p2" value="<?= $peso2 ?>">
            <br>
            <br>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado da divisão </h2>
        <?php
        $mediaS = ($valor1 + $valor2 + $peso1 + $peso2) / 4;
        $mediaP = (($valor1.$peso1) + ($valor2.$peso2)) / ($peso1+$peso2);


        print "<p> A media simples entre os números é valor é <strong> $mediaS</strong>.
        <br>
      </p> Com os pesos <strong>$peso1</strong> e <strong?>$peso2</strong> é igual a <strong>$mediaP</strong> ";

        ?>
    </section>
</body>

</html>