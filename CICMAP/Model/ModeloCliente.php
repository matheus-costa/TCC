<?php
   include_once 'ModeloPessoa.php';

    class ModeloCliente{

        public $id;
        public $pessoa;
        public $venda;
        function __construct( $id ,ModeloPessoa $pessoa, ModeloVenda $venda ) {
            $this->id = $id;
            $this->pessoa = $pessoa;
            $this->venda = $venda;

        }
    }

    
    