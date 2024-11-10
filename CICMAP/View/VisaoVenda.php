<?php

    include_once 'VisaoLayout.php';

    class VisaoVenda extends VisaoLayout {

        function listarVendas( array $vendas ) {
            $html = <<<HTML
                <h1>Vendas</h1>
                <table border="1">
            HTML;
            foreach ( $vendas as $venda ) {
                $pessoa = $venda->pessoa;
                $item = $venda->item;

                $html .= <<<HTML
                    <tr>
                        <td>$venda->id</td>
                        <td>$pessoa->nome</td>
                        <td>$item->produto</td>
                        <td><a href="?acao=removerAtleta&id=$atleta->id">X</a></td>
                    </tr>
                HTML;
            }
            $html .= <<<HTML
                </table>
                <p>
                    <a href="?acao=cadastrarVenda">Novo</a>
                </p>
            HTML;
            return $html;
        }

        function cadastrarVenda ( array $vendas ) {
            $html = <<<HTML
                <h1>Cadastrar Venda</h1>
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