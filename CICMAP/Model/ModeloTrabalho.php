<?php
    include_once 'ModeloBanca.php';
    include_once 'ModeloPessoa.php';

    class ModeloTrabalho {

        public $id;
        public $pessoa;
        public $banca;
       

        function __construct( $id, ModeloPessoa $pessoa, ModeloBanca $banca) {
            $this->id = $id;
            $this->pessoa = $pessoa;
            $this->banca = $banca;
            
        }
    }