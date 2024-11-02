<?php
      include_once '../Model/ModeloTrabalho.php';
      include_once '../Model/ModeloPessoa.php';


    class ModeloFuncionario {

        public $id;
        public $pessoa;
        public $trabalho;


        function __construct( $id, ModeloTrabalho $trabalho, ModeloPessoa $pessoa ) {
            $this->id = $id;
            $this->pessoa = $pessoa;
            $this->trabalho = $trabalho;
          
        }
    }
