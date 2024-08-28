<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos primitivos em PHP</title>
</head>
<body>
    <h1> Teste de tipos primitivos </h1>
    <?php
         $num = 300;

         echo "O valor da variável é $num";

         $v = (integer) 300; //aqui tenho uma coerção, na qual eu deixo "mais" claro que o valor 300 é do tipo INTEIRO

         var_dump($v);//"despeja na tela todas ás informações que temos sobre esta variável

    ?>
</body>
</html>