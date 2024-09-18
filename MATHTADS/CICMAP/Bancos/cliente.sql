create table cliente (
    id serial primary key,
	nome varchar(200),
	cpf varchar,
	rg varchar,
	email varchar,
	telefone varchar,
	endereco varchar,
	produto_comprado integer references produto(id)
);


