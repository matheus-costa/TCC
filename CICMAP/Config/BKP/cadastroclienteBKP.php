<?php
#include_once("includes\header.php");
include_once('../../includes/header.php');
?>
<html>
    <head>
        <meta charset="utf-8" />
    </head>    
        <body>
            <form action="../../Config/cliente_config.php" method="POST">
                    <input type="hidden" name="type" value="create">
                    <legend>Cadastro de Clientes</legend>
                    <p>Informe o seu Nome:<input type="text" id="nome" name="nome" placeholder="Informe o seu nome:"/>
                    </p>
                    <p>Informe o seu CPF:<input type="text" name="cpf" placeholder="Informe o seu CPF:"/>
                    </p>
                    <p>Informe o seu RG:<input type="number" name="rg" placeholder="Informe o seu RG:"/>
                    </p>
                    <p>Informe o seu E-mail: <input type="email" name="email" placeholder="Informe o seu E-Mail:"/>
                    </p>
                    <p>Informe o seu Telefone: <input type="number" name="telefone" placeholder="Informe o seu Telefone:"/>
                    </p>
                    <p>Informe o seu Endereço: <input type="text" name="endereco" placeholder="Informe o seu Endereço:"/>
                    </p>
                    <button type="submit" name="btn-cadastrar" class="btn green" >Cadastrar Cliente</button>
                    <a href="cliente.php"  class="btn green">Voltar</a>
                </fieldset>
            </form>
        </body>
</html>
<?php
include_once("../../includes/footer.php");
?>