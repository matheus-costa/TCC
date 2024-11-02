<?php

    include_once 'ObjetoAcessoDados.php';
    include_once 'ModeloClube.php';
    include_once 'ModeloAtleta.php';
    include_once 'VisaoClube.php';
    include_once 'VisaoAtleta.php';

    class Controlador {

        private $conexao;

        function __construct( PDO $conexao ) {
            $this->conexao = $conexao;
        }

        function listarClubes() {
            $dao = new ObjetoAcessoDados( $this->conexao );
            $clubes = $dao->buscarClubes();
            $visao = new VisaoClube();
            return $visao->cabecalho . $visao->listar( $clubes ) . $visao->rodape;
        }

        function salvarClube( $dados ) {
            $dao = new ObjetoAcessoDados( $this->conexao );
            if ( isset($dados['id']) ) {
                $clube = $dao->buscarClube( $dados['id'] );
                $clube->nome = $dados['nome'];
            } else {
                $clube = new ModeloClube(null, $dados['nome']);
            }
            $clube = $dao->salvarClube( $clube );
            return $this->listarClubes();
        }

        function removerClube ( $dados ){
            $dao = new ObjetoAcessoDados( $this->conexao );
            $clube = $dao->buscarClube( $dados['id'] );
            $dao->removerClube( $clube );
            return $this->listarClubes();
        }

        function cadastrarClube () {
            $visao = new VisaoClube();
            return $visao->cabecalho . $visao->cadastrar() . $visao->rodape;
        }

        function listarAtletas() {
            $dao = new ObjetoAcessoDados( $this->conexao );
            $atletas = $dao->buscarAtletas();
            $visao = new VisaoAtleta();
            return $visao->cabecalho . $visao->listar( $atletas ) . $visao->rodape;
        }

        function salvarAtleta( $dados ) {
            $dao = new ObjetoAcessoDados( $this->conexao );
            if ( isset($dados['id']) ) {
                $atleta = $dao->buscarAtleta( $dados['id'] );
                $atleta->nome = $dados['nome'];
                $atleta->cpf = $dados['cpf'];
                $atleta->clube = $dao->buscarClube( $dados['clube'] );
            } else {
                $atleta = new ModeloAtleta( null, $dados['nome'], $dados['cpf'], $dao->buscarClube( $dados['clube'] ) );
            }
            $clube = $dao->salvarAtleta( $atleta );
            return $this->listarAtletas();
        }

        function removerAtleta ( $dados ){
            $dao = new ObjetoAcessoDados( $this->conexao );
            $atleta = $dao->buscarAtleta( $dados['id'] );
            $dao->removerAtleta( $atleta );
            return $this->listarAtletas();
        }

        function cadastrarAtleta () {
            $dao = new ObjetoAcessoDados( $this->conexao );
            $clubes = $dao->buscarClubes();
            $visao = new VisaoAtleta();
            return $visao->cabecalho . $visao->cadastrar( $clubes ) . $visao->rodape;
        }

    }