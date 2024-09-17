create table venda(
    id serial primary key,
    cliente integer references cliente(id),
    produto integer references produto(id)
);
