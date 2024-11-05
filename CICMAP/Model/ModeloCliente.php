<?php
   include_once 'ModeloPessoa.php';

    class ModeloCliente{

        public $id;
        public $pessoa;

        function __construct( $id ,ModeloPessoa $pessoa ) {
            $this->id = $id;
            $this->pessoa = $pessoa;

        }
    }

    
    