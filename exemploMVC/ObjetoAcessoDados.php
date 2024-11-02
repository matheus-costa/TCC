<?php

    include_once 'ModeloClube.php';

    class ObjetoAcessoDados {

        private $conexao;

        function __construct( PDO $conexao ) {
            $this->conexao = $conexao;
        }

        function buscarClube( $id ) {
            $sql = " select id, nome from clube where id = '$id'; ";
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
            $clube = new ModeloClube( $resultado[0]['id'], $resultado[0]['nome'] );
            return $clube;
        }

        function buscarClubes() {
            $sql = " select id from clube order by nome; ";
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
            $clubes = [];
            foreach ( $resultado as $tupla ) {
                $clubes[] = $this->buscarClube( $tupla['id'] );
            }
            return $clubes;
        }

        function salvarClube( ModeloClube $clube ) {
            if ( is_null( $clube->id ) ) {
                $nome = $clube->nome;
                $sql = " insert into clube values (null, '$nome') returning id; ";
                $id = $this->conexao->query( $sql )->fetchAll(2)[0]['id'];
            } else {
                $id = $clube->id;
                $nome = $clube->nome;
                $sql = " update clube set nome = '$nome' where id = '$id'; ";
                $this->conexao->exec( $sql );
            }
            $clube = $this->buscarClube($id);
            return $clube;
        }

        function removerClube ( ModeloClube $clube ) {
            $id = $clube->id;
            $sql = " delete from clube where id = '$id'; ";
            $this->conexao->exec($sql);
            return null;
        }

        function buscarAtleta( $id ) {
            $sql = " select id, nome, cpf, clube from atleta where id = '$id'; ";
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
            $atleta = new ModeloAtleta( $resultado[0]['id'], $resultado[0]['nome'], $resultado[0]['cpf'], $this->buscarClube($resultado[0]['clube']) );
            return $atleta;
        }

        function buscarAtletas() {
            $sql = " select id from atleta order by nome; ";
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
            $atletas = [];
            foreach ( $resultado as $tupla ) {
                $atletas[] = $this->buscarAtleta( $tupla['id'] );
            }
            return $atletas;
        }

        function salvarAtleta( ModeloAtleta $atleta ) {
            $nome = $atleta->nome;
            $cpf = $atleta->cpf;
            $clube = $atleta->clube;
            $cid = $clube->id;
            if ( is_null( $atleta->id ) ) {
                $sql = " insert into atleta values (null, '$nome', '$cpf', '$cid') returning id; ";
                $id = $this->conexao->query( $sql )->fetchAll(2)[0]['id'];
            } else {
                $id = $atleta->id;
                $sql = " update atleta set nome = '$nome', cpf = '$cpf', clube = '$cid' where id = '$id'; ";
                $this->conexao->exec( $sql );
            }
            $atleta = $this->buscarAtleta($id);
            return $atleta;
        }

        function removerAtleta ( ModeloAtleta $atleta ) {
            $id = $atleta->id;
            $sql = " delete from atleta where id = '$id'; ";
            $this->conexao->exec($sql);
            return null;
        }

    }