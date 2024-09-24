<?php

    include_once 'VisaoLayout.php';
    //include_once('../View/includes/header.php');

    class VisaoAtleta extends VisaoLayout {

        function listar( array $bancas ) {
            $html = <<<HTML
                <h1>Bancas</h1>
                <table border="1">
            HTML;
            foreach ( $bancas as $banca ) {
                $propriedade = $banca->propriedade;
                $html .= <<<HTML
                    <tr>
                        <td>$banca->id</td>
                        <td>$banca->nome</td>
                        <td>$banca->numeracao</td>
                        <td>$propriedade->nome</td>
                        <td><a href="?acao=removerBanca&id=$banca->id">X</a></td>
                    </tr>
                HTML;
            }
            $html .= <<<HTML
                </table>
                <p>
                    <a href="?acao=cadastrarBanca">Novo</a>
                </p>
            HTML;
            return $html;
        }

        function cadastrar ( array $bancas ) {
            $html = <<<HTML
                <h1>Cadastrar Bancas</h1>
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
            foreach ( $bancas as $banca ) {
            $html .= <<<HTML
                            <option value="$->id">$banca->nome</option>
            HTML;
            }
            $html .= <<<HTML
                        </select>
                    </p>
                    <p>
                        <button type="submit" formmethod="post" formaction="?acao=salvarBanca">Cadastrar</button>
                    </p>
                </form>
            HTML;
            return $html;
        }

    }
?>
<?php
   // include_once('../View/includes/footer.php');
       


/**  <input type="hidden" name="type" value="create">
 *  <div class="input-field col s12"> Informe o nome da sua banca:<input type="text" id="nome" name="nome" placeholder="Informe o nome da sua banca:" /> </div> 
 * <div class="input-field col s12">
 * Informe a numeração da sua banca:<input type="text" name="numeracao" placeholder="Informe a numeração da sua Banca:" />
             */    