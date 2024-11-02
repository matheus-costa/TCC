<?php
   include_once 'ModeloItem.php';
   include_once 'ModeloPessoa.php';

    class ModeloFornecedor {

        public $id;
        public $pessoa;
        public $item;
        public $cnpj;

  function __construct( $id,  ModeloItem $item,  ModeloPessoa $pessoa, $cnpj) {
            $this->id = $id;
            $this->item = $item;
            $this->pessoa = $pessoa;
        }
    }