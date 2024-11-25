<?php

    include_once 'VisaoLayout.php';

    class VisaoVenda extends VisaoLayout {

        function listarVendas( $vendas ) {
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
                $item = $venda->item;
                $produto = $item->produto;

                $html .= <<<HTML
                    <tr>
                        <td>$venda->id</td>
                        <td>$item->id</td>
                        <td>$produto->nome</td>
                        <td>$pessoa->nome</td>
                        <td><a href="?acao=removerVenda&id=$venda->id">X</a></td>
                    </tr>
                HTML;
            }
            $html .= <<<HTML
                </table>
                <p>
                    <a href="?acao=cadastrarVendas">Novo</a>
                </p>
            HTML;
            return $html;
        }

        function cadastrarVendas ( $vendas,$pessoa, $item) {
            $html = <<<HTML
                <h1>Cadastrar Venda</h1>
                <form>
                    <p>
                        Nome do produto <br/>
                        <input type="text" name="nome" autocomplete="off" />
                    </p>
                    <p>
                        Nome do cliente <br/>
                        <input type="text" name="cpf" autocomplete="off" />
                    </p>

                    <p>
                        <select name ="item">
                            <option hidden>Selecionar Item</option>
                    </p>        
            HTML;       
            foreach ( $item as $itens ) {
                $vendas = $itens->nome;
            $html .= <<<HTML
                            <option value="$itens->id">$item->nome</option>
            HTML;
                            }
            $html .= <<<HTML
                        </select>
                    </p>

                    <p>
                        <select name="pessoa">
                            <option hidden>Selecionar Cliente</option>
            HTML;
            foreach ( $pessoa as $pessoas ) {
                $vendas = $pessoas->nome;
            $html .= <<<HTML
                            <option value="$pessoas->id">$pessoa->nome</option>
            HTML;
            }
            $html .= <<<HTML
                        </select>
                    </p>
            HTML;
           
            $html .= <<<HTML
                    </p>

                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarPessoas">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }

    }