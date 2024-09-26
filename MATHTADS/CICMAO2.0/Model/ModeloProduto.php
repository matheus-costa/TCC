<?php
    include_once 'ModeloVendaProduto.php';
    include_once 'ModeloFornecedor.php';

    class ModeloProduto {

        public $id;
        public $nome;
        public $tamanho;
        public $marca;
        public $preco;
        public $vendaProduto;
        public $fornecedor;
      

        function __construct( $id, $nome,$tamanho, $marca, $preco, ModeloVendaProduto $vendaProduto, ModeloFornecedor $fornecedor  ) {
            $this->id = $id;
            $this->nome = $nome;
            $this->tamanho = $tamanho;
            $this->marca = $marca;
            $this->preco = $preco;
            $this->vendaProduto = $vendaProduto;
            $this->fornecedor = $fornecedor;
        }
    }
