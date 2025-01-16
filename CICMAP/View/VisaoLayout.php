<?php

    class VisaoLayout {

        public $cabecalho = <<<HTML
        <html>
            <head>
                <meta charset="utf-8" />
                <link href="carrinho.css" rel="stylesheet"/> 

            </head>
            <body>
                <p>
                    <a href="?acao=listarProdutos">Produtos</a>
                    <a href="?acao=listarBancas">Bancas</a>
                    <a href="?acao=listarFornecedores">Fornecedor</a>
                    <a href="?acao=listarPessoas">Pesssoas</a>
                    <a href="?acao=listarVendas">Vendas</a>
                    <a href="?acao=listarItens">Itens</a>
                    <a href="?acao=listarCarrinho">Carrinho de Compras</a>
                </p>
        HTML;

        public $rodape = <<<HTML
            </body>
        </html>
        HTML;

    }