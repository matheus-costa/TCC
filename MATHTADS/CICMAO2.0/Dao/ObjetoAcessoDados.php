<?php

    // Inclui o arquivo com a classe ModeloClube
    include_once 'ModeloClube.php';

    // Define a classe ObjetoAcessoDados
    class ObjetoAcessoDados {

        // Declara uma variável privada para armazenar a conexão com o banco de dados
        private $conexao;

        // Construtor que recebe a conexão PDO como parâmetro e atribui à variável $conexao
        function __construct( PDO $conexao = new PDO('pgsql:host=localhost;port=5432;dbname=TCC;user=postgres;password=postgres')) {
            $this->conexao = $conexao;
        }

        // Função para buscar um clube pelo ID
        function buscarBanca( $id ) {
            // Monta a query SQL para selecionar o clube pelo ID
            $sql = " select id, nome, numeracao, proprietario, produtos, funcionario from banca where id = '$id'; ";

            // Executa a query e obtém o resultado
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );

            // Cria uma nova instância de ModeloClube com os dados retornados
            $banca = new ModeloBanca( $resultado[0]['id'], $resultado[0]['nome'], 
                                     $resultado[0]['numeracao'], $resultado[0]['proprietario'], 
                                     $resultado[0]['produtos'], $resultado[0]['funcionario'] );

            // Retorna o objeto clube
            return $banca;
        }

        // Função para buscar todos os clubes
        function buscarBancas() {
            // Monta a query SQL para selecionar todos os clubes ordenados por nome
            $sql = " select id, nome, numeracao, proprietario, produtos, funcionario  from banca order by nome; ";

            // Executa a query e obtém o resultado
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );

            // Cria um array vazio para armazenar os clubes
            $bancas = [];

            // Para cada resultado, busca o clube pelo ID e o adiciona ao array
            foreach ( $resultado as $tupla ) {
                $bancas[] = $this->buscarClube( $tupla['id'] );
            }

            // Retorna o array de clubes
            return $bancas;
        }

        // Função para salvar um clube (inserir ou atualizar)
        function salvarBanca( ModeloClube $clube ) {
            // Se o ID do clube for nulo, insere um novo clube
            if ( is_null( $clube->id ) ) {
                $nome = $clube->nome;
                // Monta a query SQL para inserir o clube e retornar o ID
                $sql = " insert into clube values (null, '$nome') returning id; ";

                // Executa a query e obtém o ID gerado
                $id = $this->conexao->query( $sql )->fetchAll(2)[0]['id'];
            } else {
                // Se o clube já existir (ID não for nulo), atualiza o clube
                $id = $clube->id;
                $nome = $clube->nome;
                // Monta a query SQL para atualizar o clube existente
                $sql = " update clube set nome = '$nome' where id = '$id'; ";

                // Executa a query de atualização
                $this->conexao->exec( $sql );
            }

            // Busca o clube atualizado ou recém-inserido e o retorna
            $clube = $this->buscarClube($id);
            return $clube;
        }

        // Função para remover um clube
        function removerClube ( ModeloClube $clube ) {
            // Obtém o ID do clube a ser removido
            $id = $clube->id;

            // Monta a query SQL para deletar o clube pelo ID
            $sql = " delete from clube where id = '$id'; ";

            // Executa a query de remoção
            $this->conexao->exec($sql);

            // Retorna null, indicando que o clube foi removido
            return null;
        }

        // Função para buscar um atleta pelo ID
        function buscarAtleta( $id ) {
            // Monta a query SQL para selecionar o atleta pelo ID
            $sql = " select id, nome, cpf, clube from atleta where id = '$id'; ";

            // Executa a query e obtém o resultado
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );

            // Cria uma nova instância de ModeloAtleta com os dados retornados e o clube associado
            $atleta = new ModeloAtleta( $resultado[0]['id'], $resultado[0]['nome'], $resultado[0]['cpf'], $this->buscarClube($resultado[0]['clube']) );

            // Retorna o objeto atleta
            return $atleta;
        }

        // Função para buscar todos os atletas
        function buscarAtletas() {
            // Monta a query SQL para selecionar todos os atletas ordenados por nome
            $sql = " select id from atleta order by nome; ";

            // Executa a query e obtém o resultado
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );

            // Cria um array vazio para armazenar os atletas
            $atletas = [];

            // Para cada resultado, busca o atleta pelo ID e o adiciona ao array
            foreach ( $resultado as $tupla ) {
                $atletas[] = $this->buscarAtleta( $tupla['id'] );
            }

            // Retorna o array de atletas
            return $atletas;
        }

        // Função para salvar um atleta (inserir ou atualizar)
        function salvarAtleta( ModeloAtleta $atleta ) {
            $nome = $atleta->nome;
            $cpf = $atleta->cpf;
            $clube = $atleta->clube;
            $cid = $clube->id;

            // Se o ID do atleta for nulo, insere um novo atleta
            if ( is_null( $atleta->id ) ) {
                // Monta a query SQL para inserir o atleta e retornar o ID
                $sql = " insert into atleta values (null, '$nome', '$cpf', '$cid') returning id; ";

                // Executa a query e obtém o ID gerado
                $id = $this->conexao->query( $sql )->fetchAll(2)[0]['id'];
            } else {
                // Se o atleta já existir (ID não for nulo), atualiza o atleta
                $id = $atleta->id;

                // Monta a query SQL para atualizar o atleta existente
                $sql = " update atleta set nome = '$nome', cpf = '$cpf', clube = '$cid' where id = '$id'; ";

                // Executa a query de atualização
                $this->conexao->exec( $sql );
            }

            // Busca o atleta atualizado ou recém-inserido e o retorna
            $atleta = $this->buscarAtleta($id);
            return $atleta;
        }

        // Função para remover um atleta
        function removerAtleta ( ModeloAtleta $atleta ) {
            // Obtém o ID do atleta a ser removido
            $id = $atleta->id;

            // Monta a query SQL para deletar o atleta pelo ID
            $sql = " delete from atleta where id = '$id'; ";

            // Executa a query de remoção
            $this->conexao->exec($sql);

            // Retorna null, indicando que o atleta foi removido
            return null;
        }

    }
/*  
create table banca(
    id serial primary key,
    nome varchar,
    numeracao varchar,
    proprietario integer references proprietario,
    produtos integer references produtos,
    funcionario integer references funcionario // EM ALGUNS CASOS O PRÓPRIO PROPRIETARIO É O FUNCIONARIO, O QUE FAZER?
);
create table cliente (
    id serial primary key,
	nome varchar(200),
	cpf varchar,
	rg varchar,
	email varchar,
	telefone varchar,
	endereco varchar,
	venda_produto integer references venda(id) 
);
create table compra(
    id serial primary key,
    fornecedor integer references cliente(id),
    produto_compra integer references proprietario(id),
    proprietario_compra integer references proprietario(id)
);
create table fornecedor (
    id serial primary key,
	nome varchar(200),
	cpf varchar,
	rg varchar,
	cnpj varchar,
	email varchar,
	telefone varchar,
	produto_fornecedor integer references fornecedor(id)
);
create table funcionario (
    id serial primary key,
	nome varchar(200),
	cpf varchar,
	rg varchar,
	email varchar,
	telefone varchar,
	proprietario_chefe integer references proprietario(id)
);
CREATE TABLE produto(  
    id serial primary key,
    nome varchar(200),
    tamanho varchar,
    marca varchar,
    preco varchar,
    fornecedor_produto integer references fornecedor(id),
    venda_produto integer references venda(id)
);
CREATE TABLE proprietario(
    id serial primary key,
    nome varchar(200),
    cpf varchar,
    rg varchar,
    telefone varchar,
    endereco varchar,
    banca integer references banca(id)
);
create table venda(
    id serial primary key,
    cliente_venda integer references cliente(id),
    produto_venda integer references produto(id)
);
*/
