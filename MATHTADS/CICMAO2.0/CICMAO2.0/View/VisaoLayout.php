<?php

    class VisaoLayout {

        public $cabecalho = <<<HTML
        <html>
            <head>
                <meta charset="utf-8" />
            </head>
            <body>
                <p>
                    <a href="?acao=listarClubes">Clubes</a>
                    <a href="?acao=listarAtletas">Atletas</a>
                </p>
        HTML;

        public $rodape = <<<HTML
            </body>
        </html>
        HTML;

    }