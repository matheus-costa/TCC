<?php

    include_once 'VisaoLayout.php';
    //include_once('../View/includes/header.php');

    class VisaoCliente extends VisaoLayout {

        function listarClientes( array $clientes ) {
            $html = <<<HTML
                <h1>Clientes</h1>
                <tr>
                    <th> Nome do Cliente     </th>
                    <th> CPF do Cliente      </th>
                    <th> RG do Cliente		  </th>
                    <th> E-mail do Cliente	  </th>
                    <th> Telefone do Cliente </th>
                    <th> Endereço do Cliente </th>
                    <th> Excluir  Cliente    </th>
                </tr>
                <table border="1">
            HTML;
            foreach ( $clientes as $cliente ) {
                $pessoa = $cliente->pessoa;
                $html .= <<<HTML
                    <tr>
                        <td>$pessoa->nome</td>
                        <td>$pessoa->cpf</td>
                        <td>$pessoa->rg</td>
                        <td>$pessoa->email</td>
                        <td>$pessoa->telefone</td>
                        <td>$pessoa->endereco</td>
                        <td><a href="?acao=removerCliente&id=$cliente->id">X</a></td>
                    </tr>
                HTML;
            }
            $html .= <<<HTML
                </table>
                <p>
                    <a href="?acao=cadastrarCliente">Novo</a>
                </p>
            HTML;
            return $html;
        }

        function cadastrarClientes ( array $cliente ) {
            $html = <<<HTML
                <h1>Cadastrar Clientes</h1>
                <form>
                    <p>
                        Nome: <br/>
                        <input type="text" name="nome" autocomplete="off" />
                    </p>
                    <p>
                        Numeracao: <br/>
                        <input type="text" name="numeracao" autocomplete="off" />
                    </p>
                    <p>
                        <select name="banca">
                            <option hidden>Selecione</option>
            HTML;
            foreach ( $cliente as $clientes ) {
            $html .= <<<HTML
                            <option value="$->id">$clientes->nome</option>
            HTML;
            }
            $html .= <<<HTML
                        </select>
                    </p>
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarCliente">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }

    }
?>
