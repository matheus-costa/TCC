<?php

    // Inclui o arquivo com a classe ObjetoAcessoDados
    include_once '../Dao/ObjetoAcessoDados.php';
    //VIEWS
    include_once '../View/VisaoBanca.php';
    include_once '../View/VisaoCliente.php';
    include_once '../View/VisaoFornecedor.php';
    include_once '../View/VisaoFuncionario.php';
    include_once '../View/VisaoProduto.php';
    include_once '../View/VisaoProprietario.php';
    //MODELS
    include_once '../Model/ModeloBanca.php';
    include_once '../Model/ModeloCliente.php';
    include_once '../Model/ModeloFornecedor.php';
    include_once '../Model/ModeloFuncionario.php';
    include_once '../Model/ModeloProduto.php';
    include_once '../Model/ModeloProprietario.php';
    include_once '../Model/ModeloVendaProduto.php';
    include_once '../Model/ModeloCompraProduto.php';
    // Define a classe Controlador
    class Controlador {

        // Declara uma variável privada para armazenar a conexão com o banco de dados
        private $conexao;

        // Construtor que recebe a conexão PDO como parâmetro e atribui à variável $conexao
        function __construct( PDO $conexao = new PDO('pgsql:host=localhost;port=5432;dbname=tcc;user=postgres;password=14122001')) {
            $this->conexao = $conexao;
        }

        // Função para listar bancas
        function listarBancas() {
            // Cria uma instância de ObjetoAcessoDados passando a conexão
            $dao = new ObjetoAcessoDados( $this->conexao );
            
            // Busca os bancas através do DAO
            $bancas = $dao->buscarBancas();
            
            // Cria uma instância de VisaoBanca para renderizar a saída
            $visao = new VisaoBanca();
            
            // Retorna a visualização dos bancas com cabeçalho e rodapé
            return $visao->cabecalho . $visao->listar( $bancas ) . $visao->rodape;
        }

        // Função para salvar uma banca
        function salvarBanca( $dados ) {
            // Cria uma instância de ObjetoAcessoDados passando a conexão
            $dao = new ObjetoAcessoDados( $this->conexao );

            if ( isset($dados['id']) ) {
                $banca = $dao->buscarBanca( $dados['id'] );
                $banca->nome = $dados['nome'];
                $banca->numeracao = $dados['numeracao'];

            } else {
                // Caso contrário, cria um novo banca com os dados fornecidos
                $banca = new ModeloBanca(null, $dados['nome'], $dados['numercao']);
            }

            // Salva o banca no banco de dados
            $banca = $dao->salvarBanca( $banca );

            // Retorna a lista de banca atualizada
            return $this->listarBancas();
        }

        // Função para remover um bancas
        function removerBanca ( $dados ){
            // Cria uma instância de ObjetoAcessoDados passando a conexão
            $dao = new ObjetoAcessoDados( $this->conexao );
            
            // Busca o banca pelo ID fornecido
            $banca = $dao->buscarBanca( $dados['id'] );
            
            // Remove o banca do banco de dados
            $dao->removerBanca( $banca );
            
            // Retorna a lista de banca atualizada
            return $this->listarBancas();
        }

        // Função para mostrar o formulário de cadastro de clube
        function cadastrarBancas () {
            // Cria uma instância de VisaoBanca para renderizar o formulário
            $dao = new ObjetoAcessoDados( $this->conexao );
            
            $visao = new VisaoBanca();

            $banca = $dao->buscarBancas();
            // Retorna a visualização do formulário de cadastro com cabeçalho e rodapé
            return $visao->cabecalho . $visao->cadastrar( $banca ) . $visao->rodape;
        }

        // Função para listar atletas
        function listarProdutos() {
            $dao = new ObjetoAcessoDados( $this->conexao );      
            $produtos = $dao->buscarProdutos();         
            $visao = new VisaoProduto();
            return $visao->cabecalho . $visao->listar( $produtos ) . $visao->rodape;
        }

        // Função para salvar um atleta
        function salvarProduto( $dados ) {
            $dao = new ObjetoAcessoDados( $this->conexao );
            if ( isset($dados['id']) ) {
                // Busca o atleta existente e atualiza os dados
                $produto = $dao->buscarProduto( $dados['id'] );
                $produto->nome = $dados['nome'];
                $produto->tamanho = $dados['tamanho'];
                $produto->marca = $dados['marca'];
                $produto->preco = $dados['preco'];
            } else {
                $produto = new ModeloProduto( null, $dados['nome'], $dados['tamanho'],$dados['marca'], $dados['preco']);
            }

            $produto = $dao->salvarProduto( $produto );
            return $this->listarProdutos();
        }

        function removerProduto ( $dados ){
            $dao = new ObjetoAcessoDados( $this->conexao );
            $produto = $dao->buscarProduto( $dados['id'] );
            $dao->removerProduto( $produto );
            return $this->listarProdutos();
        }

        function cadastrarProduto () {

            $dao = new ObjetoAcessoDados( $this->conexao );
            $produtos = $dao->buscarProdutos();
            $visao = new VisaoProduto();
            return $visao->cabecalho . $visao->cadastrar( $produtos ) . $visao->rodape;
        }

    }
