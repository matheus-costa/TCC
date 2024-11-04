<?php

    include_once 'VisaoLayout.php';

    class VisaoFornecedor extends VisaoLayout {

        function listarFornecedores( array $fornecedores ) {
            $html = <<<HTML
                <h1>Fornedores</h1>
                <table border="1">
                <tr>
                    <th> CNPJ do Fornecedor            </th>
                    <th> Número da Banca          </th>
                    <th> Nome do Funcionário     </th>
                    <th> CPF do Funcionário      </th>
                    <th> RG do Funcionário		  </th>
                    <th> E-mail do Funcionário	  </th>
                    <th> Telefone do Funcionário </th>
                    <th> Endereço do Funcionário </th>
                    <th> Excluir  Funcionário    </th>
                </tr>
            HTML;
            foreach ( $fornecedores as $fornecedor ) {
                $pessoa = $fornecedor->pessoa;
                $html .= <<<HTML
                    <tr>
                        <td>$fornecedor->cnpj</td>
                        <td>$pessoa->nome</td>
                        <td>$pessoa->cpf</td>
                        <td>$pessoa->rg</td>
                        <td>$pessoa->email</td>
                        <td>$pessoa->telefone</td>
                        <td>$pessoa->endereco</td>
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
                    <p>
                        Nome do Funcionario <br/>
                        <input type="text" name="nome" autocomplete="off" />
                    </p>
                    <p>
                        CPF <br/>
                        <input type="text" name="cpf" autocomplete="off" />
                    </p>
                    <p>
                        RG <br/>
                        <input type="text" name="rg" autocomplete="off" />
                    </p>
                    <p>
                        E-MAIL <br/>
                        <input type="text" name="email" autocomplete="off" />
                    </p>
                    <p>
                        TELEFONE <br/>
                        <input type="text" name="telefone" autocomplete="off" />
                    </p>
                    <p>
                        ENDERECO <br/>
                        <input type="text" name="endereco" autocomplete="off" />
                    </p>
                    <p>
                        <select name="clube">
                            <option hidden>Selecione</option>
            HTML;
            foreach ( $clubes as $clube ) {
            $html .= <<<HTML
                            <option value="$clube->id">$clube->nome</option>
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