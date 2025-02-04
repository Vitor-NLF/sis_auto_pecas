create database autopecas;
use autopecas;

/*criando a tabela cliente*/
create table clientes(
	id int not null auto_increment primary key,
    nome varchar(140) not null,
    cpf char(11) not null,
    email varchar(200) not null
);

/*criando a tabela produtos*/
create table produtos(
	id int not null auto_increment primary key,
    nome varchar(100) not null,
    descricao text not null,
    estoque int not null,
    preco decimal(10,2) not null
);


/*criando a tabela servicos*/
create table servicos (
    id int not null auto_increment primary key,
    titulo_serv varchar(255) not null,
    id_cliente int not null,
    descricao text,
    data_inicio date not null,
    data_fim date not null,
    valor_serv decimal(10, 2),
    id_produto int null,
    foreign key(id_cliente) references clientes(id),
    foreign key (id_produto) references produtos(id) on delete set null
);


/*criando os selects logo abaixo para ver as tabelas*/

select * from clientes;
select * from produtos;
select * from servicos;

/*select usado no PHP*/

SELECT clientes.nome AS Cliente, produtos.nome AS Produto, servicos.id as Id, servicos.titulo_serv 
AS Servico, servicos.descricao AS Sobre, servicos.duracao_dias 
AS Duracao, servicos.valor_serv as Valor FROM clientes JOIN servicos ON clientes.id = servicos.id_cliente JOIN produtos  
on produtos.id = servicos.id_produto;