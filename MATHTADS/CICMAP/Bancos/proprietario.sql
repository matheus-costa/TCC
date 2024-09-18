
CREATE TABLE proprietario(
    id serial primary key,
    nome varchar(200),
    cpf varchar,
    rg varchar,
    telefone varchar,
    endereco varchar,
    banca integer references banca(id)
);
create table compra(
    id serial primary key,
    fornecedor integer references cliente(id),
    produto integer references proprietario(id),
    proprietario integer references proprietario(id),
);