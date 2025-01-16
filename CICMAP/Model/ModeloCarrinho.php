<?php
    include_once 'ModeloItem.php';

    class ModeloCarrinho {
 
        public $item;

        function __construct(ModeloItem $item) {
            $this->item = $item;
        }
    }