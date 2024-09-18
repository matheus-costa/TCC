<?php

    class ModeloFuncionario {

        public $id;
        public $nome;
        public $cpf;
        public $rg;
        public $email;
        public $telefone;

        function __construct( $id, $nome, $cpf, $rg, $email, $telefone ) {
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->rg = $rg;
            $this->email = $email;
            $this->telefone = $telefone;
        }
    }
