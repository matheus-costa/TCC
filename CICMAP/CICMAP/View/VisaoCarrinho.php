<?php
    include_once 'VisaoLayout.php';
#<link  rel="stylesheet" href="./carrinho.css" />
    class VisaoCarrinho extends VisaoLayout {

        function listarCarrinho( $vendas ) {
            $html = <<<HTML
            <head>
                <meta charset="utf-8"/> 
            </head>
                    <body>
                            <div class="container">
                                     <h1>Carrinho de compras</h1> 
                                    <table border="1">
                                    <tr>
                                        <th> Nome do Produto     </th>
                                        <th> Preço do Produto </th>
                                        <th> Nome do Cliente     </th>
                                        <th> Data da Venda </th>
                                        <th> Selecionar Item </th>
                                    </tr>
                              </div>
                   </body>
            HTML;
            foreach ( $vendas as $venda ) {
                $pessoa = $venda->pessoa;
                $item = $venda->item;
                $produto = $item->produto;

                $html .= <<<HTML
                    <tr>
                        <td>$produto->nome</td>
                        <td>$produto->preco</td>
                        <td>$pessoa->nome</td>
                        <td>$venda->data_venda</td>
                        <td><a href="?acao=comprarCarrinho&id=$venda->id">Comprar</a></td>
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

        function cadastrarCarinho ($pessoas, $item) {
            $html = <<<HTML
                <h1>Cadastrar Venda</h1>
                <form>
                    <p>
                        Data da venda: <br/>
                        <input type="date" name="data_venda" autocomplete="off" />
                    </p>
                    <p>
                        <select name ="item">
                            <option hidden>Selecionar Item</option>
                    </p>        
            HTML;       
            foreach ( $item as $itens ) {
                $produto = $itens->produto;
            $html .= <<<HTML
                            <option value="$produto->id">$produto->nome</option>
            HTML;
                            }
            $html .= <<<HTML
                        </select>
                    </p>

                    <p>
                        <select name="pessoa">
                            <option hidden>Selecionar Cliente</option>
            HTML;
            foreach ( $pessoas as $pessoa ) {
            $html .= <<<HTML
                         <option value="$pessoa->id">$pessoa->id</option>
            HTML;
            }
            $html .= <<<HTML
                        </select>
                    </p>
            HTML;
           
            $html .= <<<HTML
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarVenda">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }

    }