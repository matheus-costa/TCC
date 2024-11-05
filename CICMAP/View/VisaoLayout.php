<?php

    class VisaoLayout {

        public $cabecalho = <<<HTML
        <html>
            <head>
                <meta charset="utf-8" />
            </head>
            <body>
                <p>
                    <a href="?acao=listarProdutos">Produtos</a>
                    <a href="?acao=listarBancas">Bancas</a>
                    <a href="?acao=listarProprietarios">Proprietarios</a>
                    <a href="?acao=listarFuncionarios">Funcionario</a>
                    <a href="?acao=listarFornecedores">Fornecedor</a>
                    <a href="?acao=listarPessoas">Clientes</a>
                    <a href="?acao=listarVendas">Vendas</a>
                </p>
        HTML;

        public $rodape = <<<HTML
            </body>
        </html>
        HTML;

    }