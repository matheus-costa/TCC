<?php

    include_once 'VisaoLayout.php';

    class VisaoVenda extends VisaoLayout {

        function listarVendas( array $vendas ) {
            $html = <<<HTML
                <h1>Vendas</h1>
                <table border="1">
                <tr>
                    <th> ID da venda            </th>
                    <th> ID do Item      </th>
                    <th> Nome do cliente     </th>
                    <th> Nome do produto     </th>
                    <th> Excluir venda		  </th>
                </tr>
            HTML;
            foreach ( $vendas as $venda ) {
                $pessoa = $venda->pessoa;
                $produto = $venda->item->produto;
                $item = $venda->item;

                $html .= <<<HTML
                    <tr>
                        <td>$venda->id</td>
                        <td>$item->id</td>
                        <td>$venda->$item->$produto->nome</td>
                        <td>$pessoa->nome</td>
                        <td><a href="?acao=removerVenda&id=$venda->id">X</a></td>
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

        function cadastrarVendas ( array $vendas ) {
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
            foreach ( $pessoas as $pessoa ) {
            $html .= <<<HTML
                            <option value="$pessoa->id">$pessoa->nome</option>
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