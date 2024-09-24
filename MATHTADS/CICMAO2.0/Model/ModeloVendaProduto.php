<?php
    include_once 'ModeloCliente.php';
    include_once 'ModeloProduto.php';


    class ModeloVendaProduto {

        public $id;
        public $cliente;
        public $produtos;

        function __construct( $id, ModeloCliente $cliente, ModeloProduto $produtos) {
            $this->id = $id;
            $this->produtos = $produtos;
            $this->cliente = $cliente;
            
        }
    }