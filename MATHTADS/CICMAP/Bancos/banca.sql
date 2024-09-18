create table banca(

    id serial primary key,
    nome varchar,
    numeracao varchar,
    proprietario integer references proprietario,
    produtos integer references produtos,
    funcionario integer references funcionario // EM ALGUNS CASOS O PRÓPRIO PROPRIETARIO É O FUNCIONARIO, O QUE FAZER?
);
