
create table banca(

    id serial primary key,
    nome varchar,
    numeracao integer
);

create table cliente (
    id serial primary key,
	nome varchar(200),
	cpf varchar,
	rg integer,
	email varchar,
	telefone integer,
	endereco varchar
);

create table fornecedor (
    id serial primary key,
	nome varchar(200),
	cpf varchar,
	rg integer,
	email varchar,
	telefone integer
);

create table funcionario (
    id serial primary key,
	nome varchar(200),
	cpf varchar,
	rg integer,
	email varchar,
	telefone integer
);

CREATE TABLE produto(  
    id serial primary key,
    nome varchar(200),
    tamanho varchar,
    marca varchar,
    preco float
);


CREATE TABLE proprietario(
    id serial primary key,
    nome varchar(200),
    cpf varchar,
    rg integer,
    telefone integer,
    endereco varchar 
);