<?php
   include_once 'ModeloPessoa.php';

    class ModeloCliente{

        public $id;
        public $pessoa;

        

        function __construct( $id ,ModeloPessoa $pessoa ) {
            $this->pessoa = $pessoa;

        }
    }

    
    