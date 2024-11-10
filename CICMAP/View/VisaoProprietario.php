<?php

    include_once 'VisaoLayout.php';

    class VisaoProprietario extends VisaoLayout {

        function listarProprietarios( array $proprietarios ) {
            $html = <<<HTML
                <h1>Proprietarios</h1>
                <table border="1">
                <tr>
                    <th> CNPJ do Proprietário     </th>
                    <th> Nome da Banca            </th>
                    <th> Número da Banca          </th>
                    <th> Nome do Proprietário     </th>
                    <th> CPF do Proprietário      </th>
                    <th> RG do Proprietário		  </th>
                    <th> E-mail do Proprietário	  </th>
                    <th> Telefone do Proprietário </th>
                    <th> Endereço do Proprietário </th>
                    <th> Excluir  Proprietário    </th>
                </tr>
            HTML;
            foreach ( $proprietarios as $proprietario ) {
                $pessoa = $proprietario->pessoa;
                $banca = $proprietario->banca;
                $html .= <<<HTML
                    <tr>
                        <td>$proprietario->cnpj </td>
                        <td>$banca->nome        </td>
                        <td>$banca->numeracao   </td>
                        <td>$pessoa->nome       </td>
                        <td>$pessoa->cpf        </td>
                        <td>$pessoa->rg         </td>
                        <td>$pessoa->email      </td>
                        <td>$pessoa->telefone   </td>
                        <td>$pessoa->endereco   </td>
                        <td><a href="?acao=removerProprietario&id=$proprietario->id">X</a></td>
                    </tr>
                HTML;
            }
            $html .= <<<HTML
                </table>
                <p>
                    <a href="?acao=cadastrarProprietario">Novo</a>
                </p>
            HTML;
            return $html;
        }

        function cadastrarProprietarios ( array $proprietarios ) {
            $html = <<<HTML
                <h1>Cadastrar Proprietarios</h1>
                <form>
                <p>
                        CNPJ do Proprietario <br/>
                        <input type="text" name="cnpj" autocomplete="off" />
                    </p>
                    <p>
                        Nome do Proprietario <br/>
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
                        Nome da banca  <br/>
                        <input type="text" name="nome" autocomplete="off" />
                    </p>
                    <p>
                        Numeração da banca <br/>
                        <input type="text" name="numeracao" autocomplete="off" />
                    </p>
                   
            HTML;
            foreach ( $proprietarios as $proprietario ) {
            $html .= <<<HTML
                            <option value="$clube->id">$clube->nome</option>
            HTML;
            }
            $html .= <<<HTML
                        </select>
                    </p>
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarProprietario">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }
    }