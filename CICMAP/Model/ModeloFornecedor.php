<?php
   include_once 'ModeloItem.php';
   include_once 'ModeloPessoa.php';

    class ModeloFornecedor {

        public $id;
        public $cnpj;
        public $pessoa;
        public $item;

  function __construct( $id, $cnpj, ModeloItem $item,  ModeloPessoa $pessoa) {
            $this->id = $id;
            $this->cnpj = $cnpj;
            $this->item = $item;
            $this->pessoa = $pessoa;
        }
    }