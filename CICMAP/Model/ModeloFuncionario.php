<?php
      include_once '../Model/ModeloBanca.php';
      include_once '../Model/ModeloPessoa.php';


    class ModeloFuncionario {

        public $id;
        public $pessoa;
        public $banca;


        function __construct( $id, ModeloBanca $banca, ModeloPessoa $pessoa ) {
            $this->id = $id;
            $this->pessoa = $pessoa;
            $this->banca = $banca;
          
        }
    }
