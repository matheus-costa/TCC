<?php
    include_once 'ModeloItem.php';
    include_once 'ModeloPessoa.php';

    class ModeloVenda {

        public $id;
        public $pessoa;
        public $item;

        function __construct( $id, ModeloPessoa $pessoa, ModeloItem $item) {
            $this->id = $id;
            $this->pessoa = $pessoa;
            $this->item = $item;
        }
    }