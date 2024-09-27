<?php

    class ModeloCompraProduto {

        public $id;
        public $fornecedor;
        public $produtoCompra;
        public $proprietarioCompra;
    

        function __construct( $id, $fornecedor, $produtoCompra, $proprietarioCompra) {
            $this->id = $id;
            $this->fornecedor = $fornecedor;
            $this->produtoCompra = $produtoCompra;
            $this->proprietarioCompra = $proprietarioCompra;
       
        }
    }
  