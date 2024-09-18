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
