<?php

    include_once 'ModeloProduto.php';
    include_once 'ModeloFornecedor.php';
    include_once 'ModeloBanca.php';
    class ModeloItem {

        public $id;
        public $data_compra;
        public $quantidade;
        public $produto;
        public $banca;
        public $fornecedor;

        function __construct( $id, $data_compra, $quantidade, ModeloProduto $produto, ModeloFornecedor $fornecedor
        ,ModeloBanca $banca) {
            $this->id = $id;
            $this->data_compra = $data_compra;
            $this->quantidade = $quantidade;
            $this->produto = $produto;
            $this->banca = $banca;
            $this->fornecedor = $fornecedor;
        }
    }