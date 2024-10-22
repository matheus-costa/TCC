<?php

    class ModeloProduto {

        public $id;
        public $nome;
        public $tamanho;
        public $marca;
        public $preco;

        function __construct( $id, $nome, $tamanho, $marca, $preco ) {
            $this->id = $id;
            $this->nome = $nome;
            $this->tamanho = $tamanho;
            $this->marca = $marca;
            $this->preco = $preco;
        }
    }
