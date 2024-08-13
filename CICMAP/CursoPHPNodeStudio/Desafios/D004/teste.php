<pre>    
    <?php  
     $inicio = date("d-m-Y", strtotime("-7 days"));
     $fim = date("d-m-Y");
     $url ='https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\''. $inicio .'\'&@dataFinalCotacao=\''. $fim .'\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

     $dados = json_decode(file_get_contents($url), true);


     $cotacao = $dados["value"][0]["cotacaoCompra"];

     echo "A cotação do dolar hoje é $cotacao"; 

     ?>
</pre>