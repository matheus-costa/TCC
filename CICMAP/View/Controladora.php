<<<<<<< HEAD
<?php
    //var_dump (getcwd());
    //exit;
    // Inclui o arquivo com a classe ObjetoAcessoDados
    require_once 'ObjetoAcessoDados.php';
    //VIEWS
    include_once '../View/VisaoBanca.php';
    include_once '../View/VisaoCliente.php';
    include_once '../View/VisaoFornecedor.php';
    include_once '../View/VisaoFuncionario.php';
    include_once '../View/VisaoProduto.php';
    include_once '../View/VisaoProprietario.php';
    include_once '../View/VisaoLayout.php';
    //MODELS
    include_once '../Model/ModeloBanca.php';
    include_once '../Model/ModeloCliente.php';
    include_once '../Model/ModeloFornecedor.php';
    include_once '../Model/ModeloTrabalho.php';
    include_once '../Model/ModeloProduto.php';
    include_once '../Model/ModeloPropriedade.php';
    include_once '../Model/ModeloVenda.php';

    // Define a classe Controlador
    class Controladora {

        // Declara uma variável privada para armazenar a conexão com o banco de dados
        private $conexao;

        // Construtor que recebe a conexão PDO como parâmetro e atribui à variável $conexao
        function __construct( PDO $conexao ) {
            $this->conexao = $conexao;
        }
     
        function listarBancas() {
            // Cria uma instância de ObjetoAcessoDados passando a conexão
            $dao = new ObjetoAcessoDados( $this->conexao );
            // Busca os bancas através do DAO
            $bancas = $dao->buscarBancas();
            // Cria uma instância de VisaoBanca para renderizar a saída
            $visao = new VisaoBanca();
            // Retorna a visualização dos bancas com cabeçalho e rodapé
            return $visao->cabecalho . $visao->listarBancas( $bancas ) . $visao->rodape;
        }

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
    
        function cadastrarBanca () {
            // Cria uma instância de VisaoBanca para renderizar o formulário
            $dao = new ObjetoAcessoDados( $this->conexao );
            
            $visao = new VisaoBanca();

            $banca = $dao->buscarBancas();
            // Retorna a visualização do formulário de cadastro com cabeçalho e rodapé
            return $visao->cabecalho . $visao->cadastrarBancas( $banca ) . $visao->rodape;
        }
    
        function listarProdutos() {
            $dao = new ObjetoAcessoDados( $this->conexao );      
            $produtos = $dao->buscarProdutos();         
            $visao = new VisaoProduto();
            return  $visao->listarProdutos($produtos);
        }
     
        function salvarProduto( $dados ) {
            $dao = new ObjetoAcessoDados( $this->conexao );
            if ( isset($dados['id']) ) {
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
            return $visao->cabecalho . $visao->cadastrarProdutos( $produtos ) . $visao->rodape;
        }

        function listarProprietarios() {
            $dao = new ObjetoAcessoDados( $this->conexao );            
            $proprietarios = $dao->buscarProprietarios();
            $visao = new VisaoProprietario();
            return $visao->cabecalho . $visao->listarProprietarios( $proprietarios ) . $visao->rodape;
        }
 
        function salvarProprietario( $dados ) {
        
            $dao = new ObjetoAcessoDados( $this->conexao );

            if ( isset($dados['id']) ) {
                $proprietario = $dao->buscarProprietario( $dados['id'] );
                $proprietario->cnpj = $dados['cnpj'];
                $proprietario->pessoa =  $dados['pessoa'];
                $proprietario->banca =  $dados['banca'];

            } else {
                
                $proprietario = new ModeloPropriedade( null, $dados['cnpj'], $dao->buscarBanca($dados['banca']), $dao->buscarPessoa($dados['pessoa']) );
            }
            $proprietario = $dao->salvarProprietario( $proprietario );
            return $this->listarProprietarios();
          
            
        }

        function removerProprietario ( $dados ){
            $dao = new ObjetoAcessoDados( $this->conexao );
            $proprietario = $dao->buscarProprietario( $dados['id'] );
            $dao->removerProprietario( $proprietario );
            return $this->listarProprietarios();
        }
    
        function cadastrarProprietario () {
            $dao = new ObjetoAcessoDados( $this->conexao );         
            $visao = new VisaoProprietario();
            $proprietario = $dao->buscarProprietarios();
            return $visao->cabecalho . $visao->cadastrarProprietarios( $proprietario ) . $visao->rodape;
        }

        function listarVendas() {
            $dao = new ObjetoAcessoDados( $this->conexao );
            $vendas = $dao->buscarVendas();
            $visao = new VisaoVenda();
            return $visao->cabecalho . $visao->listarVendas( $vendas ) . $visao->rodape;
        }

        function salvarVenda( $dados ) {

            $dao = new ObjetoAcessoDados( $this->conexao );

            if ( isset($dados['id']) ) {
                $venda = $dao->buscarBanca( $dados['id'] );
                $venda->item = $dados['item'];
                $venda->pessoa = $dados['pessoa'];

            } else {
                $venda = new ModeloVenda(null, $dados['item'], $dados['pessoa']);
            }
            $venda = $dao->salvarVenda( $venda );
            return $this->listarVendas();
        }

        function removerVenda ( $dados ){
            $dao = new ObjetoAcessoDados( $this->conexao );
            $banca = $dao->buscarVenda( $dados['id'] );
            $dao->removerVenda( $banca );
            return $this->listarVendas();
        }
    
        function cadastrarVenda() {
            $dao = new ObjetoAcessoDados( $this->conexao );
            $visao = new VisaoVenda();
            $venda = $dao->buscarVendas();
            return $visao->cabecalho . $visao->cadastrarVendas( $venda ) . $visao->rodape;
        }

}