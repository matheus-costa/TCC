create table banca(
    id serial primary key NOT NULL,
    nome varchar NOT NULL,
    numeracao varchar NOT NULL
);

create table pessoa(
	id serial primary key NOT NULL,
	nome varchar(200) NOT NULL,
	cpf varchar NOT NULL,
	rg varchar NOT NULL,
	email varchar NOT NULL,
	telefone varchar NOT NULL,
	endereco varchar NOT NULL
);


create table fornecedor (
    id serial primary key NOT NULL,
	cnpj varchar NOT NULL,
	pessoa integer references pessoa(id)
);
CREATE TABLE produto(  
    id serial primary key NOT NULL,
    nome varchar(200) NOT NULL,
    tamanho varchar NOT NULL,
    marca varchar NOT NULL,
    preco varchar NOT NULL
);
create table item( 
    id serial primary key NOT NULL,
	data_compra date NOT NULL,
	quantidade integer NOT NULL,
    fornecedor integer references fornecedor(id),
    banca integer references banca(id),
	produto integer references produto(id)
);
create table venda(
    id serial primary key NOT NULL,
	data_venda date NOT NULL,
    pessoa integer references pessoa(id),
    item integer references item(id)
);
create table trabalho(
    id serial primary key NOT NULL,
    pessoa integer references pessoa(id),
    banca integer references banca(id)

);
create table propriedade( 
    id serial primary key NOT NULL,
	cnpj varchar NOT NULL,
    pessoa integer references pessoa(id),
    banca integer references banca(id)
);


--Insert Fornecedor
insert into fornecedor values(default, '4545', '1');
insert into fornecedor values(default, '5555', '2');
insert into fornecedor values(default, '3030', '4');
insert into fornecedor values(default, '1909', '6');

--Insert Pessoa
insert into pessoa values (default, 'fulano','00102223680','2245494678','fulano@gmail.com','11447895','na casa dele');
insert into pessoa values (default, 'VeioDaHavan','00102223680','2245494678','VeioDaHavan@gmail.com','11447895','na casa dele');
insert into pessoa values (default, 'Cliente da Silva','00102223450','224333668','Cliente@gmail.com','44588895','na casa dele');
insert into pessoa values (default, 'funcionário da Silva','001783450','22423458','funcionario@gmail.com','44588895','na casa dele');
--Insert produto normal
insert into produto values ('1', 'Tenis','45','NIKE','100');
insert into produto values ('3', 'Tenis','42','NIKE','100');
insert into produto values ('4', 'Camiseta','GG','NIKE','100');
insert into produto values ('5', 'Blusao','GG','NIKE','100');
--Insert de uma banca
insert into banca values ('1','HavanFake','13');
insert into banca values ('2','NikeFake','14');

--Insert de um Item(id, fornecedor, banca, produto)
insert into item values (default,'2', '1', '2');
--Insert de um proprietário(id, cnpj,pessoa,banca)
insert into propriedade values ('2','123456778', '1', '1');
--insert de uma venda para um cliente(id, pessoa, item)
insert into venda values (default, '1', '1');
--Insert de um funcionario(id,pessoa,banca)
insert into trabalho values (default, '1','1');
insert into trabalho values (default, '2','1');
--Insert de uma venda(id, pessoa,item);
insert into venda values(default,'2024-14-12','5','5');
INSERT INTO venda VALUES (DEFAULT,'2024-12-12', 1, 1);
INSERT INTO venda (id, data_venda,pessoa, item) VALUES (DEFAULT, '2024-12-12', 1, 1);
INSERT INTO venda (id, data_venda,pessoa, item) VALUES (DEFAULT, '2024-12-12', 2, 2);



--SELECT 
select * from banca;
select * from venda;
select * from propriedade;
select * from item;
select * from trabalho;
select * from fornecedor;
select * from pessoa;
select * from produto;



select from propriedade pr
       join pessoa pe
	   on propriedade.pessoa = pe.id
	        where pessoa.id = 1 ;

delete from propriedade where id = 1;
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
--
 select id, nome, cpf, rg, email,
        telefone, endereco 
        from pessoa 
		 where id = 1;


select id from pessoa order by nome;
delete from fornecedor where cnpj = '1234';
        
--test

select id ,pessoa, item
	  from venda 
	      join item i
		  on i.id = venda.item
		  join produto pr
		  on i.produto = pr.id
order by id;		  
		  
-- dentro da tabela item(id, fornecedor, banca, produto)
--dentro da tabela venda(id, pessoa,item)

	  
select * from venda;

select id, pessoa, item from venda where id = '3'; --SELECT ANTIGO

select id, dataHora, pessoa, item from venda where id = 1;

SELECT dataHora, pessoa, item
                           FROM venda
                                JOIN item i 
                                    ON venda.item = i.id
                                JOIN produto pr 
                                    ON pr.id = i.produto
                                ORDER BY venda.id;


								SELECT venda.id as id, venda.dataHora as dataHora, pessoa, item
                           FROM venda
                                JOIN item i 
                                    ON venda.item = i.id
                                JOIN produto pr 
                                    ON pr.id = i.produto
                                ORDER BY id;


select * from venda;			


select id, TO_CHAR(data_compra, 'dd/mm/yyyy') from item order by id;




SELECT venda.id as id, TO_CHAR(data_venda, 'dd/mm/yyyy') data_venda, pessoa, item
                           FROM venda
                                JOIN item i 
                                    ON venda.item = i.id
                                JOIN produto pr 
                                    ON pr.id = i.produto
                                ORDER BY id;