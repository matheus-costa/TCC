create table banca(
    id serial primary key,
    nome varchar,
    numeracao varchar
);

create table pessoa(
	id serial primary key,
	nome varchar(200),
	cpf varchar,
	rg varchar,
	email varchar,
	telefone varchar,
	endereco varchar
);

create table fornecedor (
    id serial primary key,
	cnpj varchar,
    pessoa integer references pessoa(id)
);

CREATE TABLE produto(  
    id serial primary key,
    nome varchar(200),
    tamanho varchar,
    marca varchar,
    preco varchar
);

create table compra(
    id serial primary key,
    banca integer references banca(id),
    produto integer references produto(id),
    fornecedor integer references fornecedor(id)
);

create table venda(
    id serial primary key,
    pessoa integer references pessoa(id),
    compra integer references compra(id)
);

create table trabalho(
    id serial primary key,
    pessoa integer references pessoa(id),
    banca integer references banca(id)

);
 
create table item( 
   id serial primary key,
   produto integer references produto(id)

);

create table propriedade( 
    id serial primary key,
	cnpj varchar,
    pessoa integer references pessoa(id),
    banca integer references banca(id)
);
create table item( 
    id serial primary key,
    fornecedor integer references fornecedor(id),
    banca integer references banca(id),
    produto integer references produto(id)
);

--DROP TABLE trabalho CASCADE;

insert into fornecedor values(default, '1234',default );
insert into propriedade values (default, '12345',default, default);
insert into pessoa values (default, 'fulano','00102223680','2245494678','fulano@gmail.com','11447895','na casa dele');
insert into pessoa values (default, 'VeioDaHavan','00102223680','2245494678','VeioDaHavan@gmail.com','11447895','na casa dele');
--Insert produto normal
insert into produto values ('1', 'Tenis','45','NIKE','100');
insert into produto values ('3', 'Tenis','42','NIKE','100');
insert into produto values ('4', 'Camiseta','GG','NIKE','100');
insert into produto values ('5', 'Blusao','GG','NIKE','100');
--Insert de uma banca
insert into banca values ('1','HavanFake','13');
--Insert de um Item
insert into item values ('1','1', '1', '1');
insert into item values ('1','1', '1', '2');
insert into item values ('1','1', '1', '3');
insert into item values ('1','1', '1', '4');
insert into item values ('1','1', '1', '5');
--Insert de um proprietário
insert into propriedade values ('2','123456', '2', '2');
--insert de uma venda para um cliente
insert into venda values (default, '1', '1');
--Insert de uma compra feita pela Banca
insert into compra values (default, '1', '5','1');

--SELECT 
select * from banca;
select * from venda;
select * from compra;
select * from propriedade;
select * from item;
select * from funcionario;
select * from fornecedor;
select * from pessoa;
select * from produto;



--Mostra o nome do produto que foi vendido para um único cliente
select p.nome
       from venda v
	   join item i
	        on v.item = i.id
	   join produto p
	        on i.produto = p.id
where p.id = 4
		order by p.nome;
		
-- Mostra os produtos de todos as  banca
select p.nome
       from item i
	   join banca b
	        on i.banca = b.id
	   join produto p
	        on i.produto = p.id	
        order by p.nome;

--Mostra Informações de todos os Proprietario
select p.nome, p.cpf, p.rg, p.email, p.telefone, p.endereco, b.nome
       from trabalho t
	   join pessoa p
	        on t.pessoa = p.id
	   join banca b
	        on t.banca = b.id
			 order by p.nome;
		
--Mostra as Informações de todos os  funcionario
select p.nome, p.cpf, p.rg, p.email, p.telefone, p.endereco, f.cnpj
       from funcionario f
	   join pessoa p
	        on f.pessoa = p.id
        order by p.nome;
		
--Mostra as Informações de todos os  cliente
select c.nome, c.cpf, c.rg, c.email, c.telefone, c.endereco
       from cliente  c
	   join pessoa p
	        on c.pessoa = p.id
        order by p.nome;		

--Mostra as Informações  de todos os Proprietario		
select p.nome as nomeProprietario, p.cpf, p.rg, p.email, p.telefone, p.endereco,
       b.nome as nomebanca , b.numeracao
       from propriedade pr  
	   join pessoa p
	        on pr.pessoa = p.id
	   join banca b
	        on pr.banca = b.id
        order by p.nome;	
		
----Mostra as Informações de um único Proprietario		
select p.nome as nomeProprietario, p.cpf, p.rg, p.email, p.telefone, p.endereco,
       b.nome as nomebanca , b.numeracao
       from propriedade pr  
	   join pessoa p
	        on pr.pessoa = p.id
	   join banca b
	        on pr.banca = b.id
where pr.id = '1'
        order by p.nome;	

--Mostra as Pessoas 
select nome,cpf, rg, email, telefone, endereco
     from pessoa 
	 order by nome;
--Mostra as compras
select p.nome as NomeProduto, p.marca, p.preco, p.tamanho,
         pe.nome as NomeFornecedor
	   from compra c
	        Join produto p
			   on c.produto = p.id
			 join fornecedor f
			   on c.fornecedor = f.id
			 join pessoa pe
			   on f.pessoa = pe.id
			 join banca ba
			   on c.banca = ba.id 
			 order by pe.nome;			 



			
        
