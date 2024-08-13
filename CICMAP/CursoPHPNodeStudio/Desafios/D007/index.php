<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salário mínimo</title>
</head>

<body>
    <?php // pegando os dados
    $valor1 = $_GET['v1'] ?? 0;
    $salMin = 1200;
    ?>
    <main>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
            <br>
            <label for="v1"> Salário R$:</label>
            <input type="number" name="v1" id="v1" value="<?= $valor1 ?>">
            <br>
            <br>
            <p>Consederando o salário mínimo como 1.200</p>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado da divisão </h2>
        <?php
        $divisao = $salMin / $valor1;
        $resto =(int) $salMin % $valor1;
        print "<p> Quem recebe um salário mínimo de <strong> $valor1</strong> ganha <strong> $divisao </strong> salário mínimo + <strong> $resto.</strong></p>";

        ?>
    </section>
</body>

</html>