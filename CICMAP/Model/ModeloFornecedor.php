<?php
    class ModeloFornecedor {

        public $id;
        public $cnpj;
        
  function __construct( $id, $cnpj ) {
            $this->id = $id;
            $this->cnpj = $cnpj;
        }
    }