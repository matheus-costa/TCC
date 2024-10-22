<?php
    class ModeloPessoa{

        public $id;
        public $nome;
        public $cpf;
        public $rg;
        public $email;
        public $telefone;
        public $endereco;

        function __construct( $id, $nome, $cpf, $rg, $email, $telefone, $endereco) {
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->rg = $rg;
            $this->email = $email;
            $this->telefone = $telefone;
            $this->endereco = $endereco;
        }
    }

    
    