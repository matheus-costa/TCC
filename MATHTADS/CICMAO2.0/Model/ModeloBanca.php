<?php
    include_once 'ModeloProprietario.php';
    include_once 'ModeloProduto.php';
    include_once 'ModeloFuncionario.php';


    class ModeloBanca {

        public $id;
        public $nome;
        public $numeracao;
        public $proprietario;
        public $produtos;
        public $funcionario;

        function __construct( $id, $nome, $numeracao, ModeloProprietario $proprietario, ModeloProduto $produtos, ModeloFuncionario $funcionario) {
            $this->id = $id;
            $this->nome = $nome;
            $this->numeracao = $numeracao;
            $this->proprietario = $proprietario;
            $this->produtos = $produtos;
            $this->proprietario = $funcionario;
            
        }
    }
    
    
    