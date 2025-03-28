<?php

    include_once 'VisaoLayout.php';
    include_once '../Model/ModeloFornecedor.php';

    class VisaoFornecedor extends VisaoLayout {

        function listarFornecedores( array $fornecedores ) {
            $html = <<<HTML
                <h1>Fornedores</h1>
                <table border="1">
                <tr>
                    <th> CNPJ do Fornecedor     </th>
                    <th> Excluir  Fornecedor    </th>
                    <th> Atualizar Fornecedor </th>
                </tr>
            HTML;
            foreach ( $fornecedores as $fornecedor ) {
                $html .= <<<HTML
                    <tr>
                        <td>$fornecedor->cnpj</td>
                        <td><a href="?acao=removerFornecedor&id=$fornecedor->id">X</a></td>
                        <td><a href="?acao=atualizarFornecedor&id=$fornecedor->id">X</a></td>
                    </tr>
                HTML;
            }
            $html .= <<<HTML
                </table>
                <p>
                    <a href="?acao=cadastrarFornecedor">Novo</a>
                </p>
            HTML;
            return $html;
        }

        function cadastrarFornecedor ( array $pessoas ) {
            $html = <<<HTML
                <h1>Cadastrar Fornecedores</h1>
                <form>
               <p>
                        CNPJ <br/>
                        <input type="text" name="cnpj" autocomplete="off" />
                    </p>
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarFornecedores">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }

        function atualizarFornecedor ( ModeloFornecedor $fornecedor ) {
            $html = <<<HTML
                <h1>Atualizar Fornecedor</h1>
                <form>
                    <input type="hidden" name="id" value="$fornecedor->id" />
               <p>
                        CNPJ <br/>
                        <input type="text" name="cnpj" autocomplete="off" value="$fornecedor->cnpj" />
                    </p>
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarFornecedores">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }

    }