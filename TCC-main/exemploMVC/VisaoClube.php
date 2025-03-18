<?php

    include_once 'VisaoLayout.php';

    class VisaoClube extends VisaoLayout {

        function listar( array $clubes ) {
            $html = <<<HTML
                <h1>Clubes</h1>
                <table border="1">
            HTML;
            foreach ( $clubes as $clube ) {
                $html .= <<<HTML
                    <tr>
                        <td>$clube->id</td>
                        <td>$clube->nome</td>
                        <td><a href="?acao=removerClube&id=$clube->id">X</a></td>
                    </tr>
                HTML;
            }
            $html .= <<<HTML
                </table>
                <p>
                    <a href="?acao=cadastrarClube">Novo</a>
                </p>
            HTML;
            return $html;
        }

        function cadastrar () {
            $html = <<<HTML
                <form>
                    <p>
                        Nome <br/>
                        <input type="text" name="nome" autocomplete="off" />
                    </p>
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarClube">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }

    }