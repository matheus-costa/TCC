<?php

    // Inclui o arquivo com a classe ObjetoAcessoDados
    include_once 'ObjetoAcessoDados.php';

    // Inclui o arquivo com a classe ModeloClube
    include_once 'ModeloClube.php';

    // Inclui o arquivo com a classe ModeloAtleta
    include_once 'ModeloAtleta.php';

    // Inclui o arquivo com a classe VisaoClube
    include_once 'VisaoClube.php';

    // Inclui o arquivo com a classe VisaoAtleta
    include_once 'VisaoAtleta.php';

    // Define a classe Controlador
    class Controlador {

        // Declara uma variável privada para armazenar a conexão com o banco de dados
        private $conexao;

        // Construtor que recebe a conexão PDO como parâmetro e atribui à variável $conexao
        function __construct( PDO $conexao ) {
            $this->conexao = $conexao;
        }

        // Função para listar clubes
        function listarClubes() {
            // Cria uma instância de ObjetoAcessoDados passando a conexão
            $dao = new ObjetoAcessoDados( $this->conexao );
            
            // Busca os clubes através do DAO
            $clubes = $dao->buscarClubes();
            
            // Cria uma instância de VisaoClube para renderizar a saída
            $visao = new VisaoClube();
            
            // Retorna a visualização dos clubes com cabeçalho e rodapé
            return $visao->cabecalho . $visao->listar( $clubes ) . $visao->rodape;
        }

        // Função para salvar um clube
        function salvarClube( $dados ) {
            // Cria uma instância de ObjetoAcessoDados passando a conexão
            $dao = new ObjetoAcessoDados( $this->conexao );

            // Verifica se há um 'id' nos dados (edição de clube)
            if ( isset($dados['id']) ) {
                // Busca o clube existente e atualiza o nome
                $clube = $dao->buscarClube( $dados['id'] );
                $clube->nome = $dados['nome'];
            } else {
                // Caso contrário, cria um novo clube com os dados fornecidos
                $clube = new ModeloClube(null, $dados['nome']);
            }

            // Salva o clube no banco de dados
            $clube = $dao->salvarClube( $clube );

            // Retorna a lista de clubes atualizada
            return $this->listarClubes();
        }

        // Função para remover um clube
        function removerClube ( $dados ){
            // Cria uma instância de ObjetoAcessoDados passando a conexão
            $dao = new ObjetoAcessoDados( $this->conexao );
            
            // Busca o clube pelo ID fornecido
            $clube = $dao->buscarClube( $dados['id'] );
            
            // Remove o clube do banco de dados
            $dao->removerClube( $clube );
            
            // Retorna a lista de clubes atualizada
            return $this->listarClubes();
        }

        // Função para mostrar o formulário de cadastro de clube
        function cadastrarClube () {
            // Cria uma instância de VisaoClube para renderizar o formulário
            $visao = new VisaoClube();
            
            // Retorna a visualização do formulário de cadastro com cabeçalho e rodapé
            return $visao->cabecalho . $visao->cadastrar() . $visao->rodape;
        }

        // Função para listar atletas
        function listarAtletas() {
            // Cria uma instância de ObjetoAcessoDados passando a conexão
            $dao = new ObjetoAcessoDados( $this->conexao );
            
            // Busca os atletas através do DAO
            $atletas = $dao->buscarAtletas();
            
            // Cria uma instância de VisaoAtleta para renderizar a saída
            $visao = new VisaoAtleta();
            
            // Retorna a visualização dos atletas com cabeçalho e rodapé
            return $visao->cabecalho . $visao->listar( $atletas ) . $visao->rodape;
        }

        // Função para salvar um atleta
        function salvarAtleta( $dados ) {
            // Cria uma instância de ObjetoAcessoDados passando a conexão
            $dao = new ObjetoAcessoDados( $this->conexao );

            // Verifica se há um 'id' nos dados (edição de atleta)
            if ( isset($dados['id']) ) {
                // Busca o atleta existente e atualiza os dados
                $atleta = $dao->buscarAtleta( $dados['id'] );
                $atleta->nome = $dados['nome'];
                $atleta->cpf = $dados['cpf'];
                $atleta->clube = $dao->buscarClube( $dados['clube'] );
            } else {
                // Caso contrário, cria um novo atleta com os dados fornecidos
                $atleta = new ModeloAtleta( null, $dados['nome'], $dados['cpf'], $dao->buscarClube( $dados['clube'] ) );
            }

            // Salva o atleta no banco de dados
            $clube = $dao->salvarAtleta( $atleta );

            // Retorna a lista de atletas atualizada
            return $this->listarAtletas();
        }

        // Função para remover um atleta
        function removerAtleta ( $dados ){
            // Cria uma instância de ObjetoAcessoDados passando a conexão
            $dao = new ObjetoAcessoDados( $this->conexao );
            
            // Busca o atleta pelo ID fornecido
            $atleta = $dao->buscarAtleta( $dados['id'] );
            
            // Remove o atleta do banco de dados
            $dao->removerAtleta( $atleta );
            
            // Retorna a lista de atletas atualizada
            return $this->listarAtletas();
        }

        // Função para mostrar o formulário de cadastro de atleta
        function cadastrarAtleta () {
            // Cria uma instância de ObjetoAcessoDados passando a conexão
            $dao = new ObjetoAcessoDados( $this->conexao );
            
            // Busca os clubes disponíveis
            $clubes = $dao->buscarClubes();
            
            // Cria uma instância de VisaoAtleta para renderizar o formulário
            $visao = new VisaoAtleta();
            
            // Retorna a visualização do formulário de cadastro com clubes, cabeçalho e rodapé
            return $visao->cabecalho . $visao->cadastrar( $clubes ) . $visao->rodape;
        }

    }
