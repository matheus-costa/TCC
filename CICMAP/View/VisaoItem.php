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

        function cadastrarItens ($item,$bancas, $fornecedores) {
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
                <p>
                        <select name="banca">
                            <option hidden>Selecionar Banca</option>
                </p>
            HTML; #FECHO O PRIMEIRO HTML
            foreach ( $bancas as $banca ) {  #ABRO O FOREACH BANCA
            $html .= <<<HTML
                            <option value="$banca->nome">$banca->nome</option>
            HTML;
                            }#FECHO O FOREACH BANCA

            $html .= <<<HTML
                            </select>
    
                        <p>
                            <select name="produto">
                                <option hidden>Selecionar Produto</option>
                        </p>

            HTML;
                
           foreach ( $item as $itens ) {#ABRO O FOREACH  DOS PRODUTOS
            $produto = $itens->produto;
            $html .= <<<HTML
                            <option value="$produto->nome">$produto->nome</option>
            HTML;
                            }#FECHO O FOREACH DOS PRODUTOS
           
            $html .= <<<HTML
                            </select>
                        </p>
                        <p>
                            <select name="fornecedor">
                                <option hidden>Selecionar Fornecedor</option>
            HTML;
            foreach ( $fornecedores as $fornecedor ) {
            $html .= <<<HTML
                            <option value="$fornecedor->nome">$fornecedor->nome</option>
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