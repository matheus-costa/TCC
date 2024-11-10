<?php
    //var_dump (getcwd());
    //exit;
    // Inclui o arquivo com a classe ObjetoAcessoDados
    require_once 'ObjetoAcessoDados.php';
    //VIEWS//
    include_once '../View/VisaoBanca.php';
    include_once '../View/VisaoCliente.php';
    include_once '../View/VisaoFornecedor.php';
    include_once '../View/VisaoFuncionario.php';
    include_once '../View/VisaoProduto.php';
    include_once '../View/VisaoProprietario.php';
    include_once '../View/VisaoLayout.php';
    //MODELS
    include_once '../Model/ModeloBanca.php';
    include_once '../Model/ModeloPessoa.php';
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
            return  $visao->cabecalho . $visao->listarProdutos($produtos) . $visao->rodape;
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
                
                $proprietario = new ModeloPropriedade( null, $dados['cnpj'], $dao->buscarPessoa($dados['pessoa']),$dao->buscarBanca($dados['banca']) );
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
                $venda->pessoa = $dados['pessoa'];
                $venda->item = $dados['item'];
                
            } else {
                $venda = new ModeloVenda(null,$dao->buscarPessoa($dados['pessoa']),$dao->buscarItem($dados['item']) );
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

        function listarFuncionarios() {
            $dao = new ObjetoAcessoDados( $this->conexao );
            $funcionarios = $dao->buscarFuncionarios();
            $visao = new VisaoFuncionario();
            return $visao->cabecalho . $visao->listarFuncionarios( $funcionarios ) . $visao->rodape;
        }

        function salvarFuncionarios( $dados ) {

            $dao = new ObjetoAcessoDados( $this->conexao );

            if ( isset($dados['id']) ) {
                $funcionario = $dao->buscarFuncionario( $dados['id'] );
                $funcionario->banca = $dados['banca'];
                $funcionario->pessoa = $dados['pessoa'];

            } else {
                $funcionario = new ModeloTrabalho(null, $dados['banca'], $dados['pessoa']);
            }
            $funcionario = $dao->salvarFuncionario( $funcionario );
            return $this->listarFuncionarios();
        }

        function removerFuncionario ( $dados ){
            $dao = new ObjetoAcessoDados( $this->conexao );
            $funcionario = $dao->buscarFuncionario( $dados['id'] );
            $dao->removerFuncionario( $funcionario );
            return $this->listarFuncionarios();
        }

        function cadastrarFuncionarios() {
            $dao = new ObjetoAcessoDados( $this->conexao );
            $visao = new VisaoFuncionario();
            $funcionario = $dao->buscarFuncionarios();
            return $visao->cabecalho . $visao->cadastrarFuncionarios( $funcionario ) . $visao->rodape;
        }
        function listarFornecedores() {
            $dao = new ObjetoAcessoDados( $this->conexao );
            $fornecedores = $dao->buscarFornecedores();
            $visao = new VisaoFornecedor();
            return $visao->cabecalho . $visao->listarFornecedores( $fornecedores ) . $visao->rodape;
        }

        function salvarFornecedores( $dados ) {

            $dao = new ObjetoAcessoDados( $this->conexao );

            if ( isset($dados['id']) ) {
                $fornecedor = $dao->buscarfornecedores( $dados['id'] );
         

            } else {
                $fornecedor = new ModeloFornecedor(null, $dados['cnpj'],$dados['banca']);
            }
            $fornecedor = $dao->salvarFornecedor( $fornecedor );
            return $this->listarFornecedores();
        }

        function removerFornecedor ( $dados ){
            $dao = new ObjetoAcessoDados( $this->conexao );
            $fornecedor = $dao->buscarFornecedor( $dados['id'] );
            $dao->removerFornecedor( $fornecedor );
            return $this->listarFornecedores();
        }

        function cadastrarFornecedores() {
            $dao = new ObjetoAcessoDados( $this->conexao );
            $visao = new VisaoFornecedor();
            $fornecedor = $dao->buscarFornecedores();
            return $visao->cabecalho . $visao->cadastrarFornecedor( $fornecedor ) . $visao->rodape;
        }
     
        function listarPessoas() {
            $dao = new ObjetoAcessoDados( $this->conexao );
            $pessoas = $dao->buscarPessoas();
            $visao = new VisaoCliente();
            return $visao->cabecalho . $visao->listarPessoas( $pessoas ) . $visao->rodape;
        }

        function salvarPessoas( $dados ) {

            $dao = new ObjetoAcessoDados( $this->conexao );

            if ( isset($dados['id']) ) {
                $pessoa = $dao->buscarPessoa( $dados['id'] );

            } else {
                $pessoa = new ModeloPessoa(null,$dados['nome'],$dados['cpf'],$dados['rg'],$dados['email'],$dados['telefone'],$dados['endereco']);
            }
            $pessoa = $dao->salvarPessoa( $pessoa );
            return $this->listarPessoas();
        }

        function removerPessoa ( $dados ){
            $dao = new ObjetoAcessoDados( $this->conexao );
            $pessoa = $dao->buscarPessoa( $dados['id'] );
            $dao->removerPessoa( $cliente );
            return $this->listarPessoas();
        }

        function cadastrarPessoas() {
            $dao = new ObjetoAcessoDados( $this->conexao );
            $visao = new VisaoCliente();
            $pessoa = $dao->buscarPessoas();
            return $visao->cabecalho . $visao->cadastrarPessoas( $pessoa ) . $visao->rodape;
        }
}