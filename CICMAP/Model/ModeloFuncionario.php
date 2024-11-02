<?php
      include_once '../Model/ModeloProprietario.php';

    class ModeloFuncionario {

        public $id;
        public $nome;
        public $cpf;
        public $rg;
        public $email;
        public $telefone;
        public $proprietarioChefe;


        function __construct( $id, $nome, $cpf, $rg, $email, $telefone, ModeloProprietario $proprietarioChefe ) {
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->rg = $rg;
            $this->email = $email;
            $this->telefone = $telefone;
            $this->proprietarioChefe = $proprietarioChefe;
        }
    }
