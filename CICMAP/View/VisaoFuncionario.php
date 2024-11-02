<?php

    include_once 'VisaoLayout.php';

    class VisaoFuncionario extends VisaoLayout {

        function listar( array $atletas ) {
            $html = <<<HTML
                <h1>Atletas</h1>
                <table border="1">
            HTML;
            foreach ( $atletas as $atleta ) {
                $clube = $atleta->clube;
                $html .= <<<HTML
                    <tr>
                        <td>$atleta->id</td>
                        <td>$atleta->nome</td>
                        <td>$atleta->cpf</td>
                        <td>$clube->nome</td>
                        <td><a href="?acao=removerAtleta&id=$atleta->id">X</a></td>
                    </tr>
                HTML;
            }
            $html .= <<<HTML
                </table>
                <p>
                    <a href="?acao=cadastrarAtleta">Novo</a>
                </p>
            HTML;
            return $html;
        }

        function cadastrar ( array $clubes ) {
            $html = <<<HTML
                <h1>Cadastrar Atleta</h1>
                <form>
                    <p>
                        Nome <br/>
                        <input type="text" name="nome" autocomplete="off" />
                    </p>
                    <p>
                        CPF <br/>
                        <input type="text" name="cpf" autocomplete="off" />
                    </p>
                    <p>
                        <select name="clube">
                            <option hidden>Selecione</option>
            HTML;
            foreach ( $clubes as $clube ) {
            $html .= <<<HTML
                            <option value="$clube->id">$clube->nome</option>
            HTML;
            }
            $html .= <<<HTML
                        </select>
                    </p>
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarAtleta">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }

    }