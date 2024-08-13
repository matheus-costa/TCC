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

        $num = $_GET["num"] ?? 0;
        $valordDolar = 4.91;
        $convert = $num / $valordDolar;;

        echo "Seus R\$" . number_format($num, 2,"," , ".") . " e aquivalem a US\$" . number_format($convert, 2, "," ,".");//MÉTODO SIMPLES

        //formatação de moedas com internocialização

        //$padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        //echo "Seus" . numfmt_format_currency($padrao, $num, "BRL"). " e aquivalem a" .numfmt_format_currency($padrao, $convert, "USD");


        ?>
        <br>
        <p><a href="javascript:history.go(-1)">Voltar para a pagina anterior</a></p>
    </main>
</body>

</html>