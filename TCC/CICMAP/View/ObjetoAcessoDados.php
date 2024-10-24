<?php
//tentando resolver o bug do código
ini_set('max_execution_time', 60000);  // Aumenta para 60 segundos

    // Inclui o arquivo com a classe ModeloClube
    include_once '../Model/ModeloBanca.php';
    include_once '../Model/ModeloCliente.php';
    include_once '../Model/ModeloFornecedor.php';
    include_once '../Model/ModeloFuncionario.php';
    include_once '../Model/ModeloProduto.php';
    include_once '../Model/ModeloPropriedade.php';
    include_once '../Model/ModeloVenda.php';

   
    // Define a classe ObjetoAcessoDados
    class ObjetoAcessoDados {

        // Declara uma variável privada para armazenar a conexão com o banco de dados
        private $conexao;

        // Construtor que recebe a conexão PDO como parâmetro e atribui à variável $conexao
        function __construct( PDO $conexao = new PDO('pgsql:host=localhost;port=5432;dbname=tcc;user=postgres;password=postgres')) {
            $this->conexao = $conexao;
        }

        
        function buscarBanca( $id ) {
            $sql = " select id, nome, numeracao  from banca where id = '$id'; ";
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
            $banca = new ModeloBanca( $resultado[0]['id'], $resultado[0]['nome'],$resultado[0]['numeracao']);
            return $banca;
        }
        // Função para buscar todas as bancas
        function buscarBancas() {

            $sql = "select id, nome, numeracao from banca order by nome; ";
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
            $bancas = [];
            // Para cada resultado, busca a banca pelo ID e o adiciona ao array
            foreach ( $resultado as $tupla ) {
                $bancas[] = $this->buscarBanca( $tupla['id'] );
            }
              return $bancas;
        }

        function salvarBanca( ModeloBanca $banca ) {
           
            if ( is_null( $banca->id ) ) {
                $nome = $banca->nome;
                $numeracao = $banca->numeracao;
                
                $sql = " insert into banca values (default,'$nome','$numeracao') returning id; ";

                $id = $this->conexao->query( $sql )->fetchAll(2)[0]['id'];
            } else {
                $id = $banca->id;
                $nome = $banca->nome;
                $numeracao = $banca->numeracao;

                $sql = " update banca set nome = '$nome', numeracao = '$numeracao' where id = '$id'; ";
                $this->conexao->exec( $sql );
            }
            $banca = $this->buscarBanca($id);
            return $banca;
        }

        function removerBanca ( ModeloBanca $banca ) {
            $id = $banca->id;
            $sql = " delete from banca where id = '$id'; ";

            $this->conexao->exec($sql);

            return null;
        }

        function buscarCliente( $id ) {
            $sql = " select p.nome, p.cpf, p.rg, p.email, p.email, p.telefone, p.endereco      
                    from cliente  
                    join pessoa p
	                on cliente.pessoa = p.id
	                where  cliente.id = p.id; ";
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );       
            // Cria uma nova instância de ModeloAtleta com os dados retornados e o clube associado
            $cliente = new ModeloCliente( $resultado[0]['id'], $resultado[0]['p.nome'], $resultado[0]['p.cpf'],$resultado[0]['p.rg'], $resultado[0]['p.email'], $resultado[0]['p.telefone'],$resultado[0]['p.endereco'], $this->buscarCliente($resultado[0]['pessoa']));

            // Retorna o objeto atleta
            return $cliente;
        }
        
        function buscarClientes($id) {
            // Monta a query SQL para selecionar todos os clientes ordenados por nome
            $sql = "  select p.nome, p.cpf, p.rg, p.email, p.email, p.telefone, p.endereco      
                    from cliente  
                    join pessoa p
	                on cliente.pessoa = p.id
	                where  cliente.id = p.id
                    order by p.nome; ";
            // Executa a query e obtém o resultado
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
            // Cria um array vazio para armazenar os clientes
            $clientes = [];

            // Para cada resultado, busca o cliente pelo ID e o adiciona ao array
            foreach ( $resultado as $tupla ) {
                $clientes[] = $this->buscarClientes( $tupla['id'] );
            }

            // Retorna o array de clientes
            return $clientes;
        }

        function salvarCliente( ModeloCliente $cliente ) {
            $nome = $cliente->nome;
            $cpf = $cliente->cpf;
            $rg = $cliente->rg;
            $email = $cliente->email;
            $telefone = $cliente->telefone;
            $endereco = $cliente->endereco;

            // Se o ID do cliente for nulo, insere um novo cliente
            if ( is_null( $cliente->id ) ) {
                // Monta a query SQL para inserir o cliente e retornar o ID
                $sql = " insert into cliente values (null, '$nome', '$cpf','$rg','$email', '$telefone' ,'$endereco') returning id; ";

                // Executa a query e obtém o ID gerado
                $id = $this->conexao->query( $sql )->fetchAll(2)[0]['id'];
            } else {
                // Se o cliente já existir (ID não for nulo), atualiza o cliente
                $id = $cliente->id;

                // Monta a query SQL para atualizar o atleta existente
                $sql = " update cliente set nome = '$nome', cpf = '$cpf',rg = '$rg', email = '$email',telefone = '$telefone', endereco = '$endereco', vendaProduto = '$vendaProduto' where id = '$id'; ";

                // Executa a query de atualização
                $this->conexao->exec( $sql );
            }

            // Busca o atleta atualizado ou recém-inserido e o retorna
            $cliente = $this->buscarCliente($id);
            return $cliente;
        }

        function removerCliente ( ModeloCliente $cliente ) {
            // Obtém o ID do atleta a ser removido
            $id = $cliente->id;

            // Monta a query SQL para deletar o atleta pelo ID
            $sql = " delete from cliente where id = '$id'; ";

            // Executa a query de remoção
            $this->conexao->exec($sql);

            // Retorna null, indicando que o atleta foi removido
            return null;
        } 

        function buscarFornecedor( $id ) {
            $sql = " select id, nome, cpf, rg, cnpj, email, telefone, endereco, produtoFornecedor from fornecedor where id = '$id'; ";

            $resultado = $this->conexao->query($sql)->fetchAll( 2 );

            $fornecedor = new ModeloFornecedor( $resultado[0]['id'], $resultado[0]['nome'], $resultado[0]['cpf'],$resultado[0]['rg'], $resultado[0]['cnpj'], $resultado[0]['email'],$resultado[0]['telefone'],$resultado[0]['endereco'], $resultado[0] ['produtoFornecedor']);
           
            return $fornecedor;
        }

        function buscarFornecedores($id) {           
            $sql = " select id, nome, cpf, rg, cnpj, email, telefone, endereco ,produtoFornecedor from fornecedor order by nome; ";

            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
      
            $fornecedores = [];
           
            foreach ( $resultado as $tupla ) {
                $fornecedores[] = $this->buscarFornecedor( $tupla['id'] );
            }

            return $fornecedores;
        }

        function salvarFornecedor( ModeloFornecedor $fornecedor ) {

            $nome = $fornecedor->nome;
            $cpf = $fornecedor->cpf;
            $rg = $fornecedor->rg;
            $cnpj = $fornecedor->cnpj;
            $email = $fornecedor->email;
            $endereco = $fornecedor->endereco;
            $telefone = $fornecedor->telefone;

            $produtoFornecedor = $fornecedor->produtoFornecedor;
            $produtoFornecedorID = $produtoFornecedor->id;

           
            if ( is_null( $fornecedor->id ) ) {
                $sql = " insert into fornecedor values (null, '$nome', '$cpf','$rg','$cnpj',' $email','$endereco','$telefone','$produtoFornecedorID') returning id; ";

                
                $id = $this->conexao->query( $sql )->fetchAll(2)[0]['id'];
            } else {
           
                $id = $fornecedor->id;

                $sql = " update fornecedor set nome = '$nome', cpf = '$cpf', rg = '$rg', cnpj = '$cnpj', email = '$email', endereco ='$endereco', telefone = '$telefone',  produto_fornecedor = '$produtoFornecedorID' where id = '$id'; ";

                // Executa a query de atualização
                $this->conexao->exec( $sql );
            }

            // Busca o atleta atualizado ou recém-inserido e o retorna
            $fornecedor = $this->buscarFornecedor($id);
            return $fornecedor;
        }

        function removerFornecedor( ModeloFornecedor $fornecedor ) {
        
            $id = $fornecedor->id;

            // Monta a query SQL para deletar o atleta pelo ID
            $sql = " delete from fornecedor where id = '$id'; ";

            // Executa a query de remoção
            $this->conexao->exec($sql);

            // Retorna null, indicando que o atleta foi removido
            return null;
        }

        function buscarFuncionario( $id ) {
            $sql = " select id, nome, cpf, rg, email, telefone, proprietario_chefe from funcionario where id = '$id'; ";
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
            $funcionario = new ModeloFuncionario( $resultado[0]['id'], $resultado[0]['nome'], $resultado[0]['cpf'], $resultado[0]['rg'], $resultado[0]['email'], $resultado[0]['telefone'], $resultado[0]['proprietario_chefe'] );

            return $funcionario;
        }

        function buscarFuncionarios() {

            $sql = " select id, nome, cpf, rg, email, telefone, proprietario_chefe from funcionario order by nome; ";
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
            $funcionarios = [];
            foreach ( $resultado as $tupla ) {
                $funcionarios[] = $this->buscarFuncionarios( $tupla['id'] );
            }
            return $funcionarios;
        }
        
        function salvarFuncionario( ModeloFuncionario $funcionario ) {
            if ( is_null( $funcionario->id ) ) {
                $nome = $funcionario->nome;
                $cpf = $funcionario->cpf;
                $rg = $funcionario->rg;
                $email = $funcionario->email;
                $telefone = $funcionario->telefone;
                $proprietarioChefe = $funcionario->proprietarioChefe;
                
                // Monta a query SQL para inserir o clube e retornar o ID
                $sql = " insert into funcionario values (null, '$nome','$cpf','$rg','$email', '$telefone','$proprietarioChefe') returning id; ";

                // Executa a query e obtém o ID gerado
                $id = $this->conexao->query( $sql )->fetchAll(2)[0]['id'];
            } else {
                $id =  $funcionario->id;
                $nome = $funcionario->nome;
                $cpf = $funcionario->cpf;
                $rg = $funcionario->rg;
                $email = $funcionario->email;
                $telefone = $funcionario->telefone;

                $proprietarioChefe = $funcionario->proprietarioChefe; 
             
                // Monta a query SQL para atualizar o clube existente
                $sql = " update funcionario set nome = '$nome', cpf = '$cpf', rg = '$rg', email = '$email', telefone = '$telefone',   $proprietarioChefe = $proprietarioChefe; = 'proprietario_chefe'  where id = '$id'; ";

                // Executa a query de atualização
                $this->conexao->exec( $sql );
            }

            // Busca o clube atualizado ou recém-inserido e o retorna
            $funcionario = $this->buscarFuncionario($id);
            return $funcionario;
        }

        function removerFuncionario ( ModeloFuncionario $funcionario ) {
            // Obtém o ID do clube a ser removido
            $id = $funcionario->id;

            // Monta a query SQL para deletar o clube pelo ID
            $sql = " delete from funcionario where id = '$id'; ";

            // Executa a query de remoção
            $this->conexao->exec($sql);

            // Retorna null, indicando que o clube foi removido
            return null;
        }
        function buscarProduto( $id ) {
           
            $sql = " select id, nome, tamanho, marca, preco from produto where id = '$id'; ";

            $resultado = $this->conexao->query($sql)->fetchAll( 2 );

            $produto = new ModeloProduto( $resultado[0]['id'], $resultado[0]['nome'], $resultado[0]['tamanho'], $resultado[0]['marca'], $resultado[0]['preco']);
         
            return $produto;
        }
        
        function buscarProdutos() {
            $sql = " select id from produto order by nome; ";

            $resultado = $this->conexao->query($sql)->fetchAll( 2 );

            $produtos = [];

            foreach ( $resultado as $tupla ) {
                $produtos[] = $this->buscarProduto( $tupla['id'] );
            }

            return $produtos;
        }

        function salvarProduto( ModeloProduto $produto) {
            $nome = $produto->nome;
            $tamanho = $produto->tamanho;
            $marca = $produto->marca;
            $preco = $produto->preco;

            if ( is_null( $produto->id ) ) {
                $sql = " insert into produto values (default, '$nome', '$tamanho', '$marca', '$preco') returning id; ";

                $id = $this->conexao->query( $sql )->fetchAll(2)[0]['id'];
            } else {
                $id = $produto->id;
                $sql = " update produto set nome = '$nome', tamanho = '$tamanho', marca = '$marca', preco = '$preco' where id = '$id'; ";

                $this->conexao->exec( $sql );
            }

            $produto = $this->buscarProduto($id);
            return $produto;
        }

        function removerProduto ( ModeloProduto $produto) {
            $id = $produto->id;
            $sql = " delete from produto where id = '$id'; ";
            $this->conexao->exec($sql);
            return null;
        }

        function buscarProprietario( $id ) {
            $sql = "select p.nome, p.cpf, p.rg, p.email, p.telefone, p.endereco,
                           b.nome, b.numeracao
                    from propriedade pr  
                    join pessoa p
                            on pr.pessoa = p.id
                    join banca b
                            on pr.banca = b.id
                where pr.id = '$id'
                        order by p.nome;";
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
            $proprietario = new ModeloPropriedade( $resultado[0][' p.nome'], $resultado[0][' p.cpf'], 
                                                    $resultado[0][' p.rg'],$resultado[0][' p.email'], 
                                                    $resultado[0][' p.telefone'], $resultado[0][' p.endereco'],
                                                    $resultado[0][' b.nome'],  $resultado[0][' b.numeracao']);

            return $proprietario;
        }
       
        function buscarProprietarios() {

            $sql = " select p.nome , p.cpf, p.rg, p.email, p.telefone, p.endereco,
                          b.nome  , b.numeracao
                        from propriedade pr  
                        join pessoa p
                                on pr.pessoa = p.id
                        join banca b
                                on pr.banca = b.id
                            order by p.nome; ";

            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
            $Proprietarios = [];
            // Para cada resultado, busca a banca pelo ID e o adiciona ao array
            foreach ( $resultado as $tupla ) {
                $proprietarios[] = $this->buscarProprietarios( $tupla['id'] );
            }
            return $proprietarios;
        }

        function salvarProprietario( ModeloPropriedade $propriedade ) {
            if ( is_null( $propriedade->id ) ) {
                $id = $propriedade->id;
                $pessoa = $propriedade->pessoa;
                $banca = $propriedade->banca;

                $sql = " insert into propriedade values (null, null, null) returning id; ";

                $id = $this->conexao->query( $sql )->fetchAll(2)[0]['id'];
            } else {
                $id = $propriedade->id;
                $pessoa = $propriedade->pessoa;
                $banca = $propriedade->banca;

                $sql = " update propriedade set cnpj = '$cnpj', pessoa = '$pessoa' where id = '$id'; ";

                $this->conexao->exec( $sql );
            }

            $proprietario = $this->buscarProprietario($id);
            return $proprietario;
        }

        function removerProprietario ( ModeloPropriedade $propriedade ) {
       
            $id = $propriedade->id;

            $sql = " delete from propriedade where id = '$id'; ";
            $this->conexao->exec($sql);
            return null;
        }
    
        function buscarVenda( $id ) {
            $sql = " select id, pessoa, item from venda where id = '$id'; ";
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
            $venda = new ModeloVenda( $resultado[0]['id'], $this->buscarPessoa($resultado[0]['pessoa']), $this->buscarItem($resultado[0]['item']) );

            return $venda;
        }

        function buscarVendas($id) {
            $sql = " select id from venda order by pessoa.id; ";
            $resultado = $this->conexao->query($sql)->fetchAll( 2 );
            $vendas = [];
            foreach ( $resultado as $tupla ) {
                $vendas[] = $this->buscarVenda( $tupla['id'] );
            }
            return $vendas;
        }

        function salvarVenda( ModeloVendaProduto $venda ) {
            $item = $venda->item;
            $Iid = $item->id;
            $pessoa = $venda->pessoa;
            $pid = $pessoa->id;

            if ( is_null( $atleta->id ) ) {
                $sql = " insert into venda values () returning id; ";
                $id = $this->conexao->query( $sql )->fetchAll(2)[0]['id'];
            } else {
                $id = $atleta->id;
                $sql = " update venda set  ";
                $this->conexao->exec( $sql );
            }
            $atleta = $this->buscarAtleta($id);
            return $atleta;
        }

        function removerVenda ( ModeloVenda $venda ) {
            $id = $venda->id;
            $sql = " delete from venda where id = '$id'; ";
            $this->conexao->exec($sql);
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
    funcionario integer references funcionario 
);


create table cliente (
    id serial primary key,
	nome varchar(200),
	cpf varchar,
	rg varchar,
	email varchar,
	telefone varchar,
	endereco varchar,
	vendainteger references venda(id) 
);

create table compra(
    id serial primary key,
    fornecedor integer references fornecedor(id),
    produto integer references produto(id),
    proprietario integer references proprietario(id)
);

create table fornecedor (
    id serial primary key,
	nome varchar(200),
	cpf varchar,
	rg varchar,
	cnpj varchar,
	email varchar,
	telefone varchar,
	produto integer references fornecedor(id)
);

create table funcionario (
    id serial primary key,
	nome varchar(200),
	cpf varchar,
	rg varchar,
	email varchar,
	telefone varchar,
	proprietario integer references proprietario(id)
);

CREATE TABLE produto(  
    id serial primary key,
    nome varchar(200),
    tamanho varchar,
    marca varchar,
    preco varchar,
    fornecedor integer references fornecedor(id),
    venda integer references venda(id)
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
    cliente integer references cliente(id),
    produto integer references produto(id)
);
*/