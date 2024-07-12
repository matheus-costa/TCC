<?php
     $host = "localhost";
     $user = "postgres";
     $db = "TCC";
     $password = "postgres";
     $port = "5432";

     try{ 
        $conexao = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user,$password,    [PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION]);
          echo"Conectado ao Banco de Dados!!!";

     }catch(PDOException $conexao){  
          echo"Falha ao conectar ao Banco de Dados!!!! <br/>";
          die ($conexao -> getMessage()); 

     };
?>