<?php
    include_once 'VisaoLayout.php';

    class VisaoProduto extends VisaoLayout {

        function listarProdutos( array $produtos ) {
            $html = <<<HTML
                <h1>Produtos</h1>
                <table border="1">
                <tr>
                    <th> ID do Produto            </th>
                    <th> Nome do Produto            </th>
                    <th> Tamanho do Produto     </th>
                    <th> Marca do Produto     </th>
                    <th> Preço do Produto		  </th>
                    <th> Excluir Produto		  </th>
                    <th> Editar Produto		  </th>

                </tr>
            HTML;
            foreach ( $produtos as $produto ) {
                $html .= <<<HTML
                    <tr>
                        <td>$produto->id</td>
                        <td>$produto->nome</td>
                        <td>$produto->tamanho</td>
                        <td>$produto->marca</td>
                        <td>$produto->preco</td>
                        <td><a href="?acao=removerProduto&id=$produto->id">X</a></td>
                        <td><a href="?acao=atualizarProduto&id=$produto->id">Y</a></td>
                    </tr>
                HTML;
            }
            $html .= <<<HTML
                </table>
                <p>
                    <a href="?acao=cadastrarProduto">Novo</a>
                </p>
            HTML;
            return $html;
        }

        function cadastrarProdutos () {
            $html = <<<HTML
                <h1>Cadastrar Produto</h1>
                <form>
                    <p>
                       Nome: <br/>
                        <input type="text" name="nome" autocomplete="off" />
                    </p>
                    <p>
                       Tamanho: <br/>
                        <input type="text" name="tamanho" autocomplete="off" />
                    </p>
                    <p>
                       Marca: <br/>
                        <input type="text" name="marca" autocomplete="off" />
                    </p>
                    <p>
                       Preco: <br/>
                        <input type="text" name="preco" autocomplete="off" />
                    </p>
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarProduto">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }
        function atualizarProduto( ModeloProduto $produto ) {
            $html = <<<HTML
                <h1>Atualizar Produtos</h1>
                <form>
                    <input type="hidden" name="id" value="$produto->id" />

                    <p>
                        Nome <br/>
                        <input type="text" name="nome" autocomplete="off" value="$produto->nome" />
                    </p>
                    <p>
                        Temanho <br/>
                        <input type="text" name="tamanho" autocomplete="off" value="$produto->tamanho" />
                    </p>
                    <p>
                        Marca <br/>
                        <input type="text" name="marca" autocomplete="off" value="$produto->marca" />
                    </p>
                    <p>
                        Preço <br/>
                        <input type="text" name="preco" autocomplete="off" value="$produto->preco" />
                    </p>
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarProduto">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }
    }