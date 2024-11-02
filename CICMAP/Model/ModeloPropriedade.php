<?php
    include_once 'ModeloItem.php';
    include_once 'ModeloPessoa.php';

    class ModeloPropriedade {

        public $id;
        public $cnpj;
        public $banca;
        public $pessoa;

        function __construct( $id, $cnpj, ModeloBanca $banca, ModeloPessoa $pessoa) {
            $this->id = $id;
            $this->cnpj = $cnpj;
            $this->banca = $banca;
            $this->pessoa = $pessoa;
        }
    }