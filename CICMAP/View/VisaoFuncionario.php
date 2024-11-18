<?php

    include_once 'VisaoLayout.php';

    class VisaoFuncionario extends VisaoLayout {

        function listarFuncionarios( array $funcionarios ) {
            $html = <<<HTML
                <h1>Funcionarios</h1>
                <table border="1">
                <tr>
                    <th> Nome da Banca            </th>
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
            foreach ( $funcionarios as $funcionario ) {
                $pessoa = $funcionario->pessoa;
                $banca = $funcionario->banca;
                $html .= <<<HTML
                    <tr>
                        <td>$banca->nome</td>
                        <td>$banca->numeracao</td>
                        <td>$pessoa->nome</td>
                        <td>$pessoa->cpf</td>
                        <td>$pessoa->rg</td>
                        <td>$pessoa->email</td>
                        <td>$pessoa->telefone</td>
                        <td>$pessoa->endereco</td>
                        <td><a href="?acao=removerFuncionario&id=$funcionario->id">X</a></td>
                    </tr>
                HTML;
            }
            $html .= <<<HTML
                </table>
                <p>
                    <a href="?acao=cadastrarFuncionarios">Novo</a>
                </p>
            HTML;
            return $html;
        }

        function cadastrarFuncionarios($bancas) {
            $html = <<<HTML
                <h1>Cadastrar Funcionarios</h1>
                <form>
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
            HTML;
            foreach ( $bancas as $banca ) {
                $html .= <<<HTML
                                <option value="$banca->id">$banca->nome</option>
                HTML;
                }
            $html .= <<<HTML
                        </select>
                    </p>
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarFuncionario">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }
    }