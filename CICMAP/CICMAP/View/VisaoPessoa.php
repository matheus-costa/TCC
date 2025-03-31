<?php

    include_once 'VisaoLayout.php';

    class VisaoPessoa extends VisaoLayout {

        function listarPessoas( array $pessoas ) {
            $html = <<<HTML
                <h1>Pessoas</h1>
                <table border="1">
                <tr>
                    <th> Nome da Pessoa     </th>
                    <th> CPF da Pessoa     </th>
                    <th> RG  da Pessoa		  </th>
                    <th> E-mail  da Pessoa	  </th>
                    <th> Telefone  da Pessoa </th>
                    <th> Endereço da Pessoa  </th>
                    <th> Excluir  Pessoa    </th>
                    <th> Atualizar  Pessoa    </th>

                </tr>
            HTML;
            foreach ( $pessoas as $pessoa ) {

                $html .= <<<HTML
                    <tr>
                        <td>$pessoa->nome</td>
                        <td>$pessoa->cpf</td>
                        <td>$pessoa->rg</td>
                        <td>$pessoa->email</td>
                        <td>$pessoa->telefone</td>
                        <td>$pessoa->endereco</td>
                        <td><a href="?acao=removerPessoa&id=$pessoa->id">X</a></td>
                        <td><a href="?acao=atualizarPessoa&id=$pessoa->id">Y</a></td>

                    </tr>
                HTML;
            }
            $html .= <<<HTML
                </table>
                <p>
                    <a href="?acao=cadastrarPessoas">Novo</a>
                </p>
            HTML;
            return $html;
        }

        function cadastrarPessoas($pessoa ,$propriedade, $trabalho) {
            $html = <<<HTML
                <h1>Cadastrar Pessoas</h1>

                <form>
                    <p>
                        Nome  <br/>
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
                        <select name ="propriedade">
                            <option hidden>Selecionar Banca</option>
                    </p>        
            HTML;       
            foreach ( $propriedade as $propriedades ) {
                $banca = $propriedades->banca;
            $html .= <<<HTML
                            <option value="$propriedades->id">$banca->nome</option>
            HTML;
                            }

            $html .= <<<HTML
                        </select>
                    </p>

                    <p>
                        <select name="trabalho">
                            <option hidden>Selecionar Trabalho</option>
            HTML;

            foreach ( $trabalho as $trabalhos ) {
                $banca = $trabalhos->banca;
            $html .= <<<HTML
                            <option value="$trabalhos->id">$banca->nome</option>
            HTML;
            }
            $html .= <<<HTML
                        </select>
                    </p>
            HTML;
           
            $html .= <<<HTML
                    </p>

                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarPessoas">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }
        function atualizarPessoa( ModeloPessoa $pessoa ) {
            $html = <<<HTML
                <h1>Atualizar pessoa</h1>
                <form>
                    <input type="hidden" name="id" value="$pessoa->id" />
                    <p>
                        Nome <br/>
                        <input type="text" name="nome" autocomplete="off" value="$pessoa->nome" />
                    </p>
                    <p>
                        CPF <br/>
                        <input type="text" name="cpf" autocomplete="off" value="$pessoa->cpf" />
                    </p>
                    <p>
                        RG <br/>
                        <input type="text" name="rg" autocomplete="off" value="$pessoa->rg" />
                    </p>
                    <p>
                        E-mail <br/>
                        <input type="text" name="email" autocomplete="off" value="$pessoa->email" />
                    </p>
                    <p>
                        Telefone <br/>
                        <input type="text" name="telefone" autocomplete="off" value="$pessoa->telefone" />
                    </p>
                    <p>
                        Encereço <br/>
                        <input type="text" name="endereco" autocomplete="off" value="$pessoa->endereco" />
                    </p>
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarPessoas">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }
    }