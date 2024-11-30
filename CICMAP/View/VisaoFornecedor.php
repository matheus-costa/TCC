<?php

    include_once 'VisaoLayout.php';

    class VisaoFornecedor extends VisaoLayout {

        function listarFornecedores( array $fornecedores ) {
            $html = <<<HTML
                <h1>Fornedores</h1>
                <table border="1">
                <tr>
                    <th> CNPJ do Fornecedor     </th>
                    <th> Excluir  Fornecedor    </th>
                </tr>
            HTML;
            foreach ( $fornecedores as $fornecedor ) {
                $html .= <<<HTML
                    <tr>
                        <td>$fornecedor->cnpj</td>
                        <td><a href="?acao=removerFornecedor&id=$fornecedor->id">X</a></td>
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

        function cadastrarFornecedor ( array $fornecedores ) {
            $html = <<<HTML
                <h1>Cadastrar Fornecedores</h1>
                <form>
               <p>
                        CNPJ <br/>
                        <input type="text" name="endereco" autocomplete="off" />
                    </p>
                  
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
                        <button type="submit" formmethod="post" formaction="?acao=salvarFornecedores">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }

    }