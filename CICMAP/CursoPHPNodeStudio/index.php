<?php
include_once("includes/header.php");
?>
<div class="row">
  <div class="col s12 m6 push-m3">
    <h3 class="light"> Clientes</h3>
       <table class="striped">
               <thead>
                    <tr>
                        <th>Nome:</th>
                        <th>Sobrenome:</th>
                        <th>E-mail:</th>
                        <th>Idade:</th>
                    </tr>
               </thead>
               <tbody>
                <tr>
                    <td>Matheus</td>
                    <td>Fonseca</td>
                    <td>Matheusfonseca.dev@gmail.com</td>
                    <td>22</td>
                    <td><a href=""class="btn-floating orange"><i class="material-icons">edit</td>
                    
                    <td><a href=""class="btn-floating red"><i class="material-icons">delete</td>
                </tr>
               </tbody>
       </table>
       <br>
       <a href="adicionar.php"class="btn">Adicionar Cliente</a>
  </div>

</div>
<?php
include_once("includes/footer.php");
?>