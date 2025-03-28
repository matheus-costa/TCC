<?php
    include_once 'VisaoLayout.php';

    class VisaoBanca extends VisaoLayout {

        function listarBancas( array $bancas ) {
            $html = <<<HTML
                <h1>Bancas</h1>
                <table border="1">
                <tr>
                    <th> ID da Banca            </th>
                    <th> Nome da Banca            </th>
                    <th> Numeração Banca     </th>
                    <th> Excluir Banca		  </th>
                </tr>
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

        function cadastrarBancas () {
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
                        <button type="submit" formmethod="post" formaction="?acao=salvarBanca">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }
    }
?>