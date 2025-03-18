<?php

    include_once 'Controlador.php';

    $sql = "
        create table if not exists clube ( id integer primary key autoincrement, nome text );
        create table if not exists atleta ( id integer primary key autoincrement, nome text, cpf text, clube integer references clube (id) );
    ";
    $conexao = new pdo ('sqlite:banco');
    $conexao->exec('PRAGMA foreign_keys = ON;');
    
    $conexao->exec($sql);
    
    if ( isset($_REQUEST['acao']) ) {
        $acao = $_REQUEST['acao'];
    } else {
        $acao = 'listarClubes';
    }
    
    $controlador = new Controlador( $conexao );
    print $controlador->$acao($_REQUEST);

    unset($conexao);