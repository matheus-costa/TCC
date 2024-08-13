<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerando número aleatórios</title>
</head>
<body>
<main>
    <h1> Trabalhando com números aleatórios </h1>
<?php
    $min = 0;
    $max = 100;
	$num = mt_rand($min , $max);
    //mt_rand() é uma função mais rápida e moderna.Porém o valor mínimo tem que ser menor do que o valor máximo
    //rand() é uma função antiga que gera valores aleatórios.Ele aceita que os valores sejam invertidos
    //random_int () é outra função que gera valores aleatórios más nesta função os valores são protegidos por criptografia

    echo"Gerando um número entre $min e $max... \n";
    echo"O número gerado é $num";
?>
 <button onclick="javascript:document.location.reload()">&#x1F504; Gerar Outro

 </button>
</main>
</body>
</html>