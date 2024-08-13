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

        $inicio = date("d-m-Y", strtotime("-7 days"));
        $fim = date("d-m-Y");
        $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\'' . $inicio . '\'&@dataFinalCotacao=\'' . $fim . '\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';
        $dados = json_decode(file_get_contents($url), true);
        $cotacao = $dados["value"][0]["cotacaoCompra"];

        $num = $_GET["num"] ?? 0;           
        $convert = $num / $cotacao;

        echo "Seus R\$" . number_format($num, 2,"," , ".") . " e aquivalem a US\$" . number_format($convert, 2, "," ,"."."Dolares");//MÉTODO SIMPLES

        //formatação de moedas com internocialização
        //$padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        //echo "Seus" . numfmt_format_currency($padrao, $num, "BRL"). " e aquivalem a" .numfmt_format_currency($padrao, $convert, "USD");


        ?>
        <br>
        <p><a href="javascript:history.go(-1)">Voltar para a pagina anterior</a></p>
    </main>
</body>

</html>