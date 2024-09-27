<?php

    include_once 'VisaoLayout.php';
    //include_once('../View/includes/header.php');

    class VisaoBanca extends VisaoLayout {

        function listar( array $bancas ) {
            $html = <<<HTML
                <h1>Bancas</h1>
                <table border="1">
            HTML;
            foreach ( $bancas as $banca ) {
                $html .= <<<HTML
                    <tr>
                        <td>$banca->id</td>
                        <td>$banca->nome</td>
                        <td>$banca->numeracao</td>
                        <td><a href="?acao=removerBanca&id=$banca->id">X</a></td>
                    </tr>
                HTML;
            }
            $html .= <<<HTML
                </table>
                <p>
                    <a href="?acao=cadastrarBanca">Novo</a>
                </p>
            HTML;
            return $html;
        }

        function cadastrar ( array $banca ) {
            $html = <<<HTML
                <h1>Cadastrar Bancas</h1>
                <form>
                    <p>
                        Nome: <br/>
                        <input type="text" name="nome" autocomplete="off" />
                    </p>
                    <p>
                        Numeracao: <br/>
                        <input type="text" name="numeracao" autocomplete="off" />
                    </p>
                    <p>
                        <select name="banca">
                            <option hidden>Selecione</option>
            HTML;
            foreach ( $banca as $bancas ) {
            $html .= <<<HTML
                            <option value="$->id">$bancas->nome</option>
            HTML;
            }
            $html .= <<<HTML
                        </select>
                    </p>
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarBanca">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }

    }
?>
