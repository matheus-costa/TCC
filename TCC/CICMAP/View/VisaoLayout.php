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
                </p>
        HTML;

        public $rodape = <<<HTML
            </body>
        </html>
        HTML;

    }