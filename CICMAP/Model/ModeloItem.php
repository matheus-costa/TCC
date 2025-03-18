<?php

    include_once 'ModeloProduto.php';
    include_once 'ModeloFornecedor.php';
    include_once 'ModeloBanca.php';
    class ModeloItem {

        public $id;
        public $data_compra;
        public $quantidade;
        public $fornecedor;
        public $banca;
        public $produto;

        function __construct( $id, $data_compra, $quantidade, ModeloFornecedor $fornecedor
        ,ModeloBanca $banca,  ModeloProduto $produto) {
            $this->id = $id;
            $this->data_compra = $data_compra;
            $this->quantidade = $quantidade;
            $this->fornecedor = $fornecedor;
            $this->banca = $banca;
            $this->produto = $produto;
            
        
        }
    }