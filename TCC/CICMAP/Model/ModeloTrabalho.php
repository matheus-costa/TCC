<?php
    include_once 'ModeloItem.php';
    include_once 'ModeloPessoa.php';

    class ModeloTrabalho {

        public $id;
        public $banca;
        public $pessoa;

        function __construct( $id, ModeloBanca $banca, ModeloPessoa $pessoa) {
            $this->id = $id;
            $this->banca = $banca;
            $this->pessoa = $pessoa;
        }
    }