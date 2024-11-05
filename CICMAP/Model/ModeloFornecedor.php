<?php
   include_once 'ModeloPessoa.php';

    class ModeloFornecedor {

        public $id;
        public $cnpj;
        public $pessoa;
        

  function __construct( $id, $cnpj, ModeloPessoa $pessoa  ) {
            $this->id = $id;
            $this->cnpj = $cnpj;
            $this->pessoa = $pessoa;

        }
    }