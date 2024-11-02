<?php

    include_once 'ModeloClube.php';

    class ModeloAtleta {

        public $id;
        public $nome;
        public $cpf;
        public $clube;

        function __construct( $id, $nome, $cpf, ModeloClube $clube ) {
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->clube = $clube;
        }

    }