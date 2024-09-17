create table compra(
    id serial primary key,
    fornecedor integer references cliente(id),
    produto integer references proprietario(id),
    proprietario integer references proprietario(id)
);