<?php

    include_once 'VisaoLayout.php';

    class VisaoProprietario extends VisaoLayout {

        function listarProprietarios( array $proprietarios ) {
            $html = <<<HTML
                <h1>Proprietarios</h1>
                <table border="1">
            HTML;
            foreach ( $proprietarios as $proprietario ) {
                $pessoa = $proprietario->pessoa;
                $banca = $proprietario->banca;
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
                        Nome <br/>
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
                        <select name="proprietario">
                            <option hidden>Selecione</option>
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