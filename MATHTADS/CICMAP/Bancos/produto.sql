CREATE TABLE produto(  
    id serial primary key,
    nome varchar(200),
    tamanho varchar,
    marca varchar,
    preco varchar,
    fornecedor_produto integer references fornecedor(id),
    venda_produto integer references venda(id)
);

