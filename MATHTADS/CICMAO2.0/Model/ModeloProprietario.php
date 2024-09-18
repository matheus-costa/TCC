<?php
   include_once 'ModeloBanca.php';

    class ModeloProprietario {

        public $id;
        public $nome;
        public $cpf;
        public $rg;
        public $telefone;
        public $endereco;
        public $banca;

        function __construct( $id, $nome, $cpf, $rg, $telefone, $endereco, ModeloBanca $banca) {
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->rg = $rg;
            $this->telefone = $telefone;
            $this->endereco = $endereco;
            $this->banca = $banca;
        }

    }