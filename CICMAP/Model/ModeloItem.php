<?php

    include_once 'ModeloProduto.php';
    include_once 'ModeloFornecedor.php';
    include_once 'ModeloBanca.php';
    include_once 'ModeloVenda.php';

    class ModeloItem {

        public $id;
        public $produto;
        public $banca;
        public $fornecedor;
        public $venda;   

        function __construct( $id, ModeloProduto $produto, ModeloFornecedor $fornecedor
        ,ModeloBanca $banca, ModeloVenda $venda) {
            $this->id = $id;
            $this->produto = $produto;
            $this->banca = $banca;
            $this->fornecedor = $fornecedor;
            $this->venda = $venda;
        }
    }