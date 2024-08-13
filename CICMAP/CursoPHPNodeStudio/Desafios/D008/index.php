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
    $salMin = 1200;
    ?>
    <main>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
            <br>
            <label for="v1"> Informe um númerio:</label>
            <input type="number" name="v1" id="v1" value="<?= $valor1 ?>">
            <br>
            <br>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado da divisão </h2>
        <?php
        $raizC = $salMin / $valor1;
        $raizQ =(int) $salMin % $valor1;


        print "<p> Sua raiz quadrada <strong> $raizQ</strong>.
              sua raiz cúbica <strong> $raizC.</strong></p>";

        ?>
    </section>
</body>

</html>