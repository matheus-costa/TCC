<?php
   include_once 'ModeloPessoa.php';

    class ModeloProprietario {

        public $id;
        public $cnpj;
        public $pessoa;

        function __construct( $id, $cnpj,  ModeloPessoa $pessoa) {
            $this->id = $id;
            $this->cnpj = $cnpj;
            $this->pessoa = $pessoa;
        }

    }