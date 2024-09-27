<?php
include_once 'Controladora.php';

    $conexao = new pdo('pgsql:host=localhost;port=5432;dbname=tcc;user=postgres;password=postgres');
    if ( isset($_REQUEST['acao']) ) {
        $acao = $_REQUEST['acao'];
    } else {
        $acao = 'listarProdutos';
    }
    
    $controladora = new Controladora( $conexao );
    print $controladora->$acao($_REQUEST);

    unset($conexao);