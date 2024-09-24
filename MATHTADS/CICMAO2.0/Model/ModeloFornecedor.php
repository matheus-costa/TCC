<?php
   include_once 'ModeloProduto.php';

    class ModeloFornecedor {

        public $id;
        public $nome;
        public $cpf;
        public $rg;
        public $cnpj;
        public $telefone;
        public $email;
        public $endereco;
        public $produtoFornecedor;

  function __construct( $id, $nome, $cpf, $rg, $cnpj, $telefone, $email,$endereco, ModeloProduto $produtoFornecedor) {
            $this->id = $id;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->rg = $rg;
            $this->cnpj = $cnpj;
            $this->telefone = $telefone;
            $this->email = $email;
            $this->endereco = $endereco;
            $this->produtoFornecedor = $produtoFornecedor;
        }

    }

    