<?php
//não tem problema. é um form com um select com os produtos, uma caixa numérica pra quantidade de itens, uma caixa para data da compra do fornecedor e botão.
    include_once 'VisaoLayout.php';

    class VisaoItem extends VisaoLayout {

        function listarItens( Array $Itens ) {
            $html = <<<HTML
                <h1>Itens</h1>
                <table border="1">
                <tr>
                    <th> Nome da Banca            </th>
                    <th> Nome do Produto            </th>
                    <th> Data da Compra            </th>
                    <th> Quantidade de Itens            </th>
                    <th> CNPJ do Fornecedor     </th>
                    <th> Marca do Produto     </th>
                    <th> Preço do Produto		  </th>
                    <th> Excluir Item		  </th>
                </tr>
            HTML;
            foreach ( $Itens as $item ) {
                $banca = $item->banca;
                $produto = $item->produto;
                $fornecedor = $item->fornecedor;
                
                $html .= <<<HTML
                    <tr>
                        <td>$banca->nome</td>
                        <td>$produto->nome</td>
                        <td>$item->data_compra</td>
                        <td>$item->quantidade</td>
                        <td>$fornecedor->cnpj</td>
                        <td>$produto->marca</td>
                        <td>$produto->preco</td>
                        <td><a href="?acao=removerItem&id=$item->id">X</a></td>
                    </tr>
                HTML;
            }
            $html .= <<<HTML
                </table>
                <p>
                    <a href="?acao=cadastrarItens">Novo</a>
                </p>
            HTML;
            return $html;
        }

        function cadastrarItens ($item,$bancas, $fornecedores, $produtos) {
            $html = <<<HTML
                <h1>Cadastrar Itens</h1>
                <form>    
                <p>
                        Data da compra: <br/>
                        <input type="date" name="data_compra" autocomplete="off" />
                </p>
                <p>
                        Quantidade de Produtos: <br/>
                        <input type="number" name="quantidade" autocomplete="off" />
                </p>
                <p>Banca<br/>
                        <select name="banca">
                            <option hidden>Selecionar Banca</option>
                </p>
            HTML; 
            foreach ( $bancas as $banca ) {
            $html .= <<<HTML
                            <option value="$banca->id">$banca->nome</option>
            HTML;
                            }//seleciona banca

            $html .= <<<HTML
                            </select>
                        </p>
    
                        <p>Produto<br/>
                            <select name="produto">
                                <option hidden>Selecionar Produto</option>
            HTML;
                
           foreach ( $produtos as $produto ) {
            $html .= <<<HTML
                            <option value="$produto->id">$produto->nome - $produto->marca - $produto->preco</option>
            HTML;
                            }// seleciona o produto
           
            $html .= <<<HTML
                            </select>
                        </p>
                        <p>Fornecedor<br/>
                            <select name="fornecedor">
                                <option hidden>Selecionar Fornecedor</option>
            HTML;
            foreach ( $fornecedores as $fornecedor ) {
            $html .= <<<HTML
                            <option value="$fornecedor->id">$fornecedor->cnpj</option>
            HTML;
                            }// seleciona o fornecedor
            $html .= <<<HTML
                            </select>
                        </p>
            HTML;

            $html .= <<<HTML
                            <p>
                <button type="submit" formmethod="post" formaction="?acao=salvarItens">Cadastrar Itens</button>
                            </p>
                     </form>
            HTML;     
            return $html;
        }
    }