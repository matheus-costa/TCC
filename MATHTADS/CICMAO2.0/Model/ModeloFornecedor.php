<?php
   include_once 'ModeloProduto.php';

    class ModeloFornecedor {

        public $id;
        public $nome;
        public $cpf;
        public $rg;
        public $telefone;
        public $endereco;
        public $produto;

        function __construct( $id, $nome, $cpf, $rg, $telefone, $endereco, ModeloProduto $produto) {
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->rg = $rg;
            $this->cnpj = $cnpj;
            $this->telefone = $telefone;
            $this->endereco = $endereco;
            $this->produto = $produto;
        }

    }
  