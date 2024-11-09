<?php

    class ModeloBanca {

        public $id;
        public $nome;
        public $numeracao;
 
        function __construct( $id, $nome, $numeracao) {
            $this->id = $id;
            $this->nome = $nome;
            $this->numeracao = $numeracao;
                }
    }
    