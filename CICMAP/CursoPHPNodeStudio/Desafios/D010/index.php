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
    $ano = 2024;
    ?>
    <main>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
            <br>
            <label for="v1">Em qual ano você nasceu:</label>
            <input type="number" name="v1" id="v1" value="<?= $valor1 ?>">
            <br>
            <br>

            <input type="submit" value="Calcular idade">
        </form>
    </main>
    <section id="resultado">
        <h2>Resultado idade </h2>
        <?php
        $idade = $ano - $valor1;

        print "Você nasceu em $valor1.<p> Sua idade em 2024 será <strong> $idade</strong> anos.";
        ?>
    </section>
</body>

</html>