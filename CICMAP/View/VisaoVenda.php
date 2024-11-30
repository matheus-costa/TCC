<?php

    include_once 'VisaoLayout.php';

    class VisaoVenda extends VisaoLayout {

        function listarVendas( $vendas ) {
            $html = <<<HTML
                <h1>Vendas</h1>
                <table border="1">
                <tr>
                    <th> ID do Item      </th>
                    <th> Nome do Produto     </th>
                    <th> Preço do Produto </th>
                    <th> Data da Venda     </th>
                    <th> Nome do Cliente     </th>
                    <th> Nome do Cliente     </th>
                    <th> Excluir Venda     </th>


                </tr>
            HTML;
            foreach ( $vendas as $venda ) {
                $pessoa = $venda->pessoa;
                $item = $venda->item;
                $produto = $item->produto;

                $html .= <<<HTML
                    <tr>
                        <td>$item->id</td>
                        <td>$produto->nome</td>
                        <td>$produto->preco</td>
                        <td>$venda->dataHora<td>
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

        function cadastrarVendas ( $pessoa, $item) {
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