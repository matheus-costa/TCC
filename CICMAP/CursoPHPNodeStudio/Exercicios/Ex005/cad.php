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
           $nome = $_GET ["nome"] ?? "sem nome";
           $sobrenome = $_GET ["sobrenome"] ?? "desconhecido"
           ;

           echo "É um prazer te conhecer, $nome $sobrenome! Este é o meu site.";
        ?>
        <br>
        <p><a href ="javascript:history.go(-1)">Voltar para a pagina anterior</a></p>
    </main>
</body>
</html> 