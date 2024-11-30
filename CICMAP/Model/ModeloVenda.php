<?php
    include_once 'ModeloItem.php';
    include_once 'ModeloPessoa.php';

    class ModeloVenda {

        public $id;
        public $dataHora;
        public $pessoa;
        public $item;

        function __construct( $id, $dataHora, ModeloPessoa $pessoa, ModeloItem $item) {
            $this->id = $id;
            $this->dataHora= $dataHora;
            $this->pessoa = $pessoa;
            $this->item = $item;
        }
    }