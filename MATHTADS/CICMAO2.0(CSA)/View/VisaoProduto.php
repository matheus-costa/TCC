<?php

    include_once 'VisaoLayout.php';

    class VisaoProduto extends VisaoLayout {

        function listar( array $produtos ) {
            $html = <<<HTML
                <h1>Produtos</h1>
                <table border="1">
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

        function cadastrar () {
            $html = <<<HTML
                <h1>Cadastrar Produto</h1>
                <form>
                    <p>
                        Nome <br/>
                        <input type="text" name="nome" autocomplete="off" />
                    </p>
                    <p>
                       Tamanho <br/>
                        <input type="text" name="tamanho" autocomplete="off" />
                    </p>
                    <p>
                       Marca <br/>
                        <input type="text" name="marca" autocomplete="off" />
                    </p>
                    <p>
                       Preco <br/>
                        <input type="text" name="preco" autocomplete="off" />
                    </p>
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarProduto">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }

    }