<?php
    include_once 'ModeloItem.php';
    include_once 'ModeloPessoa.php';

    class ModeloVenda {

        public $id;
        public $data_venda;
        public $pessoa;
        public $item;

        function __construct( $id, $data_venda, ModeloPessoa $pessoa, ModeloItem $item) {
            $this->id = $id;
            $this->data_venda = $data_venda;
            $this->pessoa = $pessoa;
            $this->item = $item;
        }
    }