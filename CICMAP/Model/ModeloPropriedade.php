<?php
    include_once 'ModeloItem.php';
    include_once 'ModeloPessoa.php';

    class ModeloPropriedade {

        public $id;
        public $cnpj;
        public $pessoa;
        public $banca;


        function __construct( $id, $cnpj, ModeloPessoa $pessoa, ModeloBanca $banca) {
            $this->id = $id;
            $this->cnpj = $cnpj;
            $this->pessoa = $pessoa;
            $this->banca = $banca;
        }    
    }