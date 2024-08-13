<?php
if(1==2){
    print(2);
}
else if($data["type"] === "edit"){
         $nome = $_REQUEST['nome'];
         $cpf = $data["cpf"];
         $rg = $data["rg"];
         $email = $data["email"];
         $telefone = $data["telefone"];
         $endereco = $data["endereco"];

         $stmt->bindParam(":nome", $nome);
         $stmt->bindParam(":cpf", $cpf);
         $stmt->bindParam(":rg", $rg);
         $stmt->bindParam(':email', $email);
         $stmt->bindParam(':telefone', $telefone);
         $stmt->bindParam(':endereco', $endereco);
         $stmt->bindParam(":id", $id);

         $query = "UPDATE cliente SET nome = :nome, cpf = :cpf, rg = :rg,  email = :email, telefone = :telefone, endereco = :endereco WHERE id = :id";

         $stmt = $conexao->prepare($query);
 
         
 
         try {
            $stmt->execute();   
        }
        catch(PDOException $e) {
        
            // Erro na conexão
            $error = $e->getMessage();
            echo "ERRO: $error";
        }

    }
?>