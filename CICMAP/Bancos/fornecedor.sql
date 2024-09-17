create table fornecedor (
    id serial primary key,
	nome varchar(200),
	cpf varchar,
	rg varchar,
	cnpj varchar,
	email varchar,
	telefone varchar,
	produto_fornecer integer references fornecedor(id)
	);