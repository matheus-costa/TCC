<?php
    include_once 'ModeloItem.php';
    include_once 'ModeloPessoa.php';

    class ModeloVenda {

        public $id;
        public $item;
        public $pessoa;

        function __construct( $id, ModeloItem $item) {
            $this->id = $id;
            $this->item = $item;
            $this->pessoa = $pessoa;
        }
    }