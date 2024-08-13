<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <header>
        <h1> </h1>
    </header>
    <main>
        <?php
           $num = $_GET ["num"] ?? "Número não informado";
           $suc = $num + 1;
           $anti = $num - 1;
           ;

           echo "Este é o número informado: <strong> $num </strong> <br>";
           echo "Este é o <em>sucessor</em>: de $num é  $suc <br> ";
           echo "Este é o <em>antecessor</em>: de $num é $anti ";
        ?>
        <br>
        <p><a href ="javascript:history.go(-1)">&#x2B05; Voltar para a pagina anterior</a></p>
    </main>
</body>
</html> 